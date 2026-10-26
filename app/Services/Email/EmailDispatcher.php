<?php

namespace App\Services\Email;

use App\Helpers\MailHelper;
use App\Models\EmailLog;
use App\Models\EmailTemplate;
use App\Models\Setting;
use App\Models\SmtpSetting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Mail\Message;

class EmailDispatcher
{
    /**
     * Maps template event_key → SmtpSetting boolean column.
     * Used by send() for customer / candidate thank-you emails.
     */
    private static array $columnMap = [
        'customer-thank-you' => 'customer_thank_you',
        'candidate-thank-you' => 'candidate_thank_you',
    ];

    /**
     * Admin detail emails. They have no EmailTemplate row — the layout is the
     * emails.admin-detail view and recipients come from SmtpSetting.
     */
    private static array $adminTypes = [
        'customer-detail' => [
            'event_key' => 'admin-customer-detail',
            'toggle' => 'admin_customer_detail',
            'to' => 'enquiry_admin_to',
            'cc' => 'enquiryCcList',
        ],
        'candidate-detail' => [
            'event_key' => 'admin-candidate-detail',
            'toggle' => 'admin_candidate_detail',
            'to' => 'career_admin_to',
            'cc' => 'careerCcList',
        ],
    ];

    /**
     * Variable keys whose values may contain trusted HTML and must NOT be escaped.
     * Empty for now — every value is escaped, so form input can never inject HTML.
     */
    private static array $rawKeys = [];

    private static function globalVariables(): array
    {
        $settings = Setting::first();

        return [
            '{brand_name}' => $settings?->site_name ?? config('app.name'),
            '{site_url}' => url('/'),
            '{logo_url}' => !empty($settings?->header_logo)
                ? asset('storage/' . $settings->header_logo)
                : '',
            '{support_number}' => $settings?->phone ?? '',
            '{support_email}' => $settings?->support_email ?? $settings?->admin_email ?? '',
            '{tagline}' => $settings?->tagline ?? '',
        ];
    }

    /**
     * Reference stored in email_logs (e.g. 'ENQ-12'), taken from {reference} if given.
     */
    private static function extractReference(array $variables): ?string
    {
        return $variables['{reference}'] ?? $variables['{order_number}'] ?? null;
    }

    /**
     * HTML-escape every value before it goes into the email body.
     */
    private static function escapeVariables(array $variables): array
    {
        foreach ($variables as $key => $value) {
            if (in_array($key, self::$rawKeys, true)) {
                continue;
            }

            $variables[$key] = e((string) $value);
        }

        return $variables;
    }

    /**
     * Single-line plain values for the subject (no HTML escaping, no line breaks).
     */
    private static function plainVariables(array $variables): array
    {
        return array_map(
            fn ($value) => trim((string) preg_replace('/\s+/', ' ', (string) $value)),
            $variables
        );
    }

    /**
     * Resolve, render, and send a template-based email (customer / candidate thank-you).
     *
     * Guard 1 — SmtpSetting per-event toggle must be enabled.
     * Guard 2 — EmailTemplate row must exist and be enabled.
     * Both must pass for the email to be sent.
     *
     * "Only if mobile is verified" is the caller's rule — call this only after OTP verification.
     *
     * @param  string       $eventKey   'customer-thank-you' | 'candidate-thank-you'
     * @param  string       $to         Recipient email address
     * @param  array        $variables  e.g. ['{customer_name}' => 'Rahul', '{service}' => 'SEO']
     * @param  string|null  $toName     Recipient display name (optional)
     * @return array{success: bool, response: mixed}
     */
    public static function send(string $eventKey, string $to, array $variables = [], ?string $toName = null): array
    {
        $reference = self::extractReference($variables);

        $smtp = SmtpSetting::getInstance();

        // ── Guard 1: SmtpSetting per-event toggle ─────────────────────────────
        $smtpCol = self::$columnMap[$eventKey] ?? null;

        if ($smtpCol && empty($smtp->{$smtpCol})) {
            Log::info("EmailDispatcher: '{$eventKey}' blocked by SMTP settings toggle ({$smtpCol} = false).");

            EmailLog::create([
                'event_key' => $eventKey,
                'to_email' => $to,
                'to_name' => $toName,
                'subject' => null,
                'status' => 'blocked',
                'reference' => $reference,
                'error_message' => "Event '{$eventKey}' is disabled in SMTP settings.",
                'meta' => $variables,
            ]);

            return [
                'success' => false,
                'response' => "Event '{$eventKey}' is disabled in SMTP settings.",
            ];
        }

        // ── Guard 2: EmailTemplate must exist and be enabled ──────────────────
        $template = EmailTemplate::where('event_key', $eventKey)
            ->where('enabled', true)
            ->first();

        if (!$template || empty($template->body)) {
            Log::warning("EmailDispatcher: template '{$eventKey}' not found or disabled.");

            EmailLog::create([
                'event_key' => $eventKey,
                'to_email' => $to,
                'to_name' => $toName,
                'subject' => null,
                'status' => 'blocked',
                'reference' => $reference,
                'error_message' => "Template '{$eventKey}' not configured or disabled.",
                'meta' => $variables,
            ]);

            return [
                'success' => false,
                'response' => "Template '{$eventKey}' not configured or disabled.",
            ];
        }

        $variables = array_merge(
            self::globalVariables(),
            $variables
        );

        // ── Render: subject gets plain values, body gets HTML-escaped values ──
        $plain = self::plainVariables($variables);
        $subject = str_replace(
            array_keys($plain),
            array_values($plain),
            $template->subject ?? ''
        );

        $safe = self::escapeVariables($variables);
        $body = str_replace(
            array_keys($safe),
            array_values($safe),
            $template->body
        );

        // ── Resolve from / reply-to (template overrides SmtpSetting fallback) ─
        $fromName = $template->from_name ?? $smtp->from_name ?? config('mail.from.name');
        $fromEmail = $template->from_email ?? $smtp->from_email ?? config('mail.from.address');
        $replyName = $template->reply_to_name ?? $smtp->reply_to_name ?? null;
        $replyEmail = $template->reply_to_email ?? $smtp->reply_to_email ?? null;
        $cc = $template->cc ?? null;

        MailHelper::configure();

        // ── Send ──────────────────────────────────────────────────────────────
        try {
            Mail::html($body, function (Message $msg) use ($to, $toName, $subject, $fromName, $fromEmail, $replyName, $replyEmail, $cc) {
                $msg->to($to, $toName)
                    ->subject($subject)
                    ->from($fromEmail, $fromName);

                if ($replyEmail) {
                    $msg->replyTo($replyEmail, $replyName);
                }

                if ($cc) {
                    $msg->cc($cc);
                }
            });

            EmailLog::create([
                'event_key' => $eventKey,
                'to_email' => $to,
                'to_name' => $toName,
                'subject' => $subject,
                'status' => 'sent',
                'reference' => $reference,
                'error_message' => null,
                'meta' => $variables,
            ]);

            return ['success' => true, 'response' => "Email sent to {$to}"];

        } catch (\Throwable $e) {
            Log::error("EmailDispatcher: exception for '{$eventKey}'.", [
                'to' => $to,
                'error' => $e->getMessage(),
            ]);

            EmailLog::create([
                'event_key' => $eventKey,
                'to_email' => $to,
                'to_name' => $toName,
                'subject' => $subject,
                'status' => 'failed',
                'reference' => $reference,
                'error_message' => $e->getMessage(),
                'meta' => $variables,
            ]);

            return ['success' => false, 'response' => $e->getMessage()];
        }
    }

    /**
     * Send the admin detail email (Customer Detail / Candidate Detail).
     *
     * Goes to the recipients saved in SMTP settings (To + CC), is sent on every
     * submission whether the mobile is verified or not, and always shows
     * "Mobile Verified: Yes/No". Guarded only by the SmtpSetting toggle.
     *
     * @param  string  $type            'customer-detail' | 'candidate-detail'
     * @param  string  $title           e.g. 'New Enquiry: Rahul Sharma (SEO)'
     * @param  array   $rows            Ordered label => value pairs shown in the email
     * @param  bool    $mobileVerified  Whether the OTP was verified
     * @param  array   $options         reference, attachment_path, attachment_name,
     *                                  reply_to, reply_to_name
     * @return array{success: bool, response: mixed}
     */
    public static function sendAdmin(string $type, string $title, array $rows, bool $mobileVerified, array $options = []): array
    {
        $cfg = self::$adminTypes[$type] ?? null;

        if (!$cfg) {
            return ['success' => false, 'response' => "Unknown admin email type '{$type}'."];
        }

        $eventKey = $cfg['event_key'];
        $smtp = SmtpSetting::getInstance();
        $to = $smtp->{$cfg['to']};
        $cc = $smtp->{$cfg['cc']}();
        $reference = $options['reference'] ?? null;

        $verifiedText = $mobileVerified ? 'Yes' : 'No';
        $subject = trim((string) preg_replace('/\s+/', ' ', "{$title} | Mobile Verified: {$verifiedText}"));

        $meta = $rows + ['Mobile Verified' => $verifiedText];

        // ── Guard: SmtpSetting toggle + recipient must be set ─────────────────
        if (!$smtp->shouldSend($cfg['toggle'])) {
            $reason = "Event '{$eventKey}' is disabled in SMTP settings.";
        } elseif (empty($to)) {
            $reason = "Admin recipient for '{$eventKey}' is not set in SMTP settings.";
        } else {
            $reason = null;
        }

        if ($reason) {
            Log::info("EmailDispatcher: {$reason}");

            EmailLog::create([
                'event_key' => $eventKey,
                'to_email' => $to ?: '',
                'to_name' => null,
                'subject' => $subject,
                'status' => 'blocked',
                'reference' => $reference,
                'error_message' => $reason,
                'meta' => $meta,
            ]);

            return ['success' => false, 'response' => $reason];
        }

        $settings = Setting::first();

        $body = view('emails.admin-detail', [
            'brand' => $settings?->site_name ?? config('app.name'),
            'title' => $title,
            'rows' => $rows,
            'mobileVerified' => $mobileVerified,
        ])->render();

        $fromName = $smtp->from_name ?? config('mail.from.name');
        $fromEmail = $smtp->from_email ?? config('mail.from.address');

        $attachmentPath = $options['attachment_path'] ?? null;
        $attachmentName = $options['attachment_name'] ?? null;
        $replyTo = $options['reply_to'] ?? null;
        $replyToName = $options['reply_to_name'] ?? null;

        if ($attachmentPath && !is_file($attachmentPath)) {
            Log::warning("EmailDispatcher: attachment not found for '{$eventKey}'.", ['path' => $attachmentPath]);
            $attachmentPath = null;
        }

        MailHelper::configure();

        try {
            Mail::html($body, function (Message $msg) use ($to, $cc, $subject, $fromName, $fromEmail, $replyTo, $replyToName, $attachmentPath, $attachmentName) {
                $msg->to($to)
                    ->subject($subject)
                    ->from($fromEmail, $fromName);

                if (!empty($cc)) {
                    $msg->cc($cc);
                }

                if ($replyTo && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
                    $msg->replyTo($replyTo, $replyToName);
                }

                if ($attachmentPath) {
                    $msg->attach($attachmentPath, array_filter(['as' => $attachmentName]));
                }
            });

            EmailLog::create([
                'event_key' => $eventKey,
                'to_email' => $to,
                'to_name' => null,
                'subject' => $subject,
                'status' => 'sent',
                'reference' => $reference,
                'error_message' => null,
                'meta' => $meta,
            ]);

            return ['success' => true, 'response' => "Admin email sent to {$to}"];

        } catch (\Throwable $e) {
            Log::error("EmailDispatcher: exception for '{$eventKey}'.", [
                'to' => $to,
                'error' => $e->getMessage(),
            ]);

            EmailLog::create([
                'event_key' => $eventKey,
                'to_email' => $to,
                'to_name' => null,
                'subject' => $subject,
                'status' => 'failed',
                'reference' => $reference,
                'error_message' => $e->getMessage(),
                'meta' => $meta,
            ]);

            return ['success' => false, 'response' => $e->getMessage()];
        }
    }

    /**
     * Same as send() but bypasses BOTH guards.
     * Used exclusively by admin test sends — always attempts delivery
     * regardless of SmtpSetting toggles or EmailTemplate enabled flag.
     *
     * Not logged to email_logs — test sends are ad-hoc admin actions,
     * not real customer-facing events.
     *
     * @param  string       $eventKey
     * @param  string       $to
     * @param  array        $variables
     * @param  string|null  $toName
     * @return array{success: bool, response: mixed}
     */
    public static function sendTest(string $eventKey, string $to, array $variables = [], ?string $toName = null): array
    {
        $template = EmailTemplate::where('event_key', $eventKey)->first();

        if (!$template || empty($template->body)) {
            return [
                'success' => false,
                'response' => "Template '{$eventKey}' not configured.",
            ];
        }

        $subject = str_replace(
            array_keys($variables),
            array_values($variables),
            $template->subject ?? '(No Subject)'
        );

        $body = str_replace(
            array_keys($variables),
            array_values($variables),
            $template->body
        );

        $smtp = SmtpSetting::getInstance();
        $fromName = $template->from_name ?? $smtp->from_name ?? config('mail.from.name');
        $fromEmail = $template->from_email ?? $smtp->from_email ?? config('mail.from.address');
        $replyName = $template->reply_to_name ?? $smtp->reply_to_name ?? null;
        $replyEmail = $template->reply_to_email ?? $smtp->reply_to_email ?? null;
        MailHelper::configure();

        try {
            Mail::html($body, function (Message $msg) use ($to, $toName, $subject, $fromName, $fromEmail, $replyName, $replyEmail) {
                $msg->to($to, $toName)
                    ->subject($subject)
                    ->from($fromEmail, $fromName);

                if ($replyEmail) {
                    $msg->replyTo($replyEmail, $replyName);
                }
            });

            return ['success' => true, 'response' => "Test email sent to {$to}"];

        } catch (\Throwable $e) {
            Log::error("EmailDispatcher test exception for '{$eventKey}'.", [
                'error' => $e->getMessage(),
            ]);

            return ['success' => false, 'response' => $e->getMessage()];
        }
    }
}