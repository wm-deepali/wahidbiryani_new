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
     * Maps event_key → SmtpSetting boolean column (Admin Notifications switches).
     * Events absent from this map have no global toggle and go straight to Guard 2.
     */
    private static array $columnMap = [
        'contact-enquiry' => 'notify_contact_enquiry',
        'feedback' => 'notify_feedback',
        'franchise-enquiry' => 'notify_franchise_enquiry',
    ];

    /**
     * Variables available in every template.
     * Values passed to send() override these.
     */
    private static function globalVariables(): array
    {
        $settings = Setting::first();
        $brand = $settings?->site_name ?: config('app.name');

        return [
            '{brand_name}' => $brand,
            '{site_url}' => route('home'),
            '{logo_url}' => $settings?->header_logo_url ?? asset('assets/img/logo.png'),
            '{submitted_at}' => now()->format('d M Y, g:i A'),
            '{ip_address}' => request()->ip() ?? '',
        ];
    }

    /**
     * Visitor's email, used as the reference in email_logs (if present).
     */
    private static function extractReference(array $variables): ?string
    {
        return $variables['{email}'] ?? null;
    }

    /**
     * Subject line: raw text, with line breaks removed (header-injection safe).
     */
    private static function renderSubject(string $subject, array $variables): string
    {
        $subject = str_replace(array_keys($variables), array_values($variables), $subject);

        return trim(preg_replace('/\s+/', ' ', $subject));
    }

    /**
     * Body: visitor-supplied values are HTML-escaped so a submitted message
     * cannot inject markup into the admin's inbox. Line breaks in {message}
     * are kept as <br>.
     */
    private static function renderBody(string $body, array $variables): string
    {
        $safe = [];

        foreach ($variables as $key => $value) {
            $value = (string) $value;

            $safe[$key] = $key === '{message}'
                ? nl2br(e($value))
                : e($value);
        }

        return str_replace(array_keys($safe), array_values($safe), $body);
    }

    /**
     * Convenience for the website forms: send an admin notification to the
     * Support Email (falls back to Admin Email) from General Settings.
     *
     * Usage:
     *   EmailDispatcher::sendToAdmin('contact-enquiry', [
     *       '{name}' => $data['name'], '{email}' => $data['email'], ...
     *   ]);
     */
    public static function sendToAdmin(string $eventKey, array $variables = []): array
    {
        $to = Setting::first()?->contact_email;

        if (empty($to)) {
            Log::warning("EmailDispatcher: '{$eventKey}' not sent — no admin/support email in General Settings.");

            return [
                'success' => false,
                'response' => 'No admin email is set in General Settings.',
            ];
        }

        return self::send($eventKey, $to, $variables, 'Admin');
    }

    /**
     * Resolve, render, and send an email for a given event.
     *
     * Guard 1 — SmtpSetting notify_* switch must be on.
     * Guard 2 — EmailTemplate row must exist and be enabled.
     * Both must pass for the email to be sent.
     *
     * @param  string       $eventKey   contact-enquiry | feedback | franchise-enquiry
     * @param  string       $to         Recipient email address
     * @param  array        $variables  e.g. ['{name}' => 'Priya', '{email}' => 'priya@example.com']
     * @param  string|null  $toName     Recipient display name (optional)
     * @return array{success: bool, response: mixed}
     */
    public static function send(string $eventKey, string $to, array $variables = [], ?string $toName = null): array
    {
        $reference = self::extractReference($variables);

        $smtp = SmtpSetting::getInstance();

        // ── Guard 1: SmtpSetting notification switch ──────────────────────────
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

        // ── Render: replace {variables} in subject and body ───────────────────
        $subject = self::renderSubject($template->subject ?? '', $variables);
        $body = self::renderBody($template->body, $variables);

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
     * Same as send() but bypasses BOTH guards.
     * Used exclusively by admin test sends — always attempts delivery
     * regardless of SmtpSetting toggles or EmailTemplate enabled flag.
     *
     * Not logged to email_logs — test sends are ad-hoc admin actions,
     * not real website events.
     *
     * @param  string       $eventKey
     * @param  string       $to
     * @param  array        $variables  Trusted sample values (EmailTemplateController::sampleVars)
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

        $subject = self::renderSubject($template->subject ?? '(No Subject)', $variables);

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