<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    protected $fillable = [
        'event_key',
        'enabled',
        'from_name',
        'from_email',
        'reply_to_name',
        'reply_to_email',
        'cc',
        'subject',
        'preview_text',
        'body',
        'extra_settings',
    ];

    protected $casts = [
        'enabled' => 'boolean',
        'extra_settings' => 'array',
    ];

    /**
     * All valid event keys, in sidebar display order.
     * Changing this list is the only thing needed to add/remove events.
     *
     * Admin emails (Customer Detail / Candidate Detail) have no template row;
     * their recipients live in smtp_settings and the layout is a view file.
     */
    public static array $eventKeys = [
        'customer-thank-you',
        'candidate-thank-you',
    ];

    /**
     * Human-readable metadata for each event key.
     */
    public static function eventMeta(): array
    {
        return [
            'customer-thank-you' => [
                'label' => 'Customer Thank You',
                'icon' => 'fa fa-heart',
                'desc' => 'Sent to the customer after a Business / Service enquiry, only when their mobile number is OTP verified.',
                'default_subject' => 'Thank you for contacting {brand_name}, {customer_name}!',
                'default_preview' => 'We have received your enquiry and will contact you shortly.',
                'default_body' => '<p>Hi {customer_name},</p>
<p>Thank you for your enquiry regarding <strong>{service}</strong>. Our team has received your details and will get in touch with you shortly on <strong>{customer_mobile}</strong>.</p>
<p>If you need anything urgently, simply reply to this email.</p>
<p>Warm regards,<br>Team {brand_name}</p>',
                'vars' => [
                    '{customer_name}' => 'Customer Name',
                    '{customer_email}' => 'Customer Email',
                    '{customer_mobile}' => 'Customer Mobile',
                    '{service}' => 'Service / Enquiry Type',
                    '{message}' => 'Customer Message',
                    '{brand_name}' => 'Brand Name',
                    '{site_url}' => 'Website URL',
                    '{logo_url}' => 'Logo URL',
                ],
                'extras' => null,
                'audience' => 'customer',
            ],
            'candidate-thank-you' => [
                'label' => 'Candidate Thank You',
                'icon' => 'fa fa-user-check',
                'desc' => 'Sent to the candidate after a Career form submission, only when their mobile number is OTP verified.',
                'default_subject' => 'Application received: {position} at {brand_name}',
                'default_preview' => 'Thank you for applying. Our HR team will review your profile.',
                'default_body' => '<p>Hi {candidate_name},</p>
<p>Thank you for applying for the <strong>{position}</strong> position at {brand_name}. We have received your application and our HR team will review your profile.</p>
<p>If your profile matches our requirements, we will contact you on <strong>{candidate_mobile}</strong>.</p>
<p>Best regards,<br>HR Team, {brand_name}</p>',
                'vars' => [
                    '{candidate_name}' => 'Candidate Name',
                    '{candidate_email}' => 'Candidate Email',
                    '{candidate_mobile}' => 'Candidate Mobile',
                    '{position}' => 'Position Applied For',
                    '{apply_type}' => 'Apply Type (Job / Internship)',
                    '{brand_name}' => 'Brand Name',
                    '{site_url}' => 'Website URL',
                    '{logo_url}' => 'Logo URL',
                ],
                'extras' => null,
                'audience' => 'candidate',
            ],
        ];
    }

    /**
     * Returns the template only when it exists AND is enabled, else null.
     * Use this as the template-level gate before sending.
     */
    public static function active(string $eventKey): ?self
    {
        return static::where('event_key', $eventKey)->where('enabled', true)->first();
    }

    /**
     * Nav badge — same logic as SmsTemplate::navBadge()
     */
    public function navBadge(): array
    {
        if ($this->enabled) {
            return ['class' => 'active-badge', 'label' => 'On'];
        }

        if (!empty($this->body)) {
            return ['class' => 'draft-badge', 'label' => 'Draft'];
        }

        return ['class' => 'off-badge', 'label' => 'Off'];
    }

    /**
     * Status badge HTML for the panel header.
     */
    public function statusBadgeHtml(): string
    {
        if ($this->enabled) {
            return '<span style="font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;background:var(--green-bg);color:var(--green);border:1px solid var(--green-border)">
                        <i class="fa fa-circle" style="font-size:7px;margin-right:4px"></i>Active
                    </span>';
        }

        if (!empty($this->body)) {
            return '<span style="font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;background:var(--amber-bg);color:var(--amber);border:1px solid var(--amber-border)">Draft</span>';
        }

        return '<span style="font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;background:var(--bg);color:var(--text-hint);border:1px solid var(--border)">Off</span>';
    }
}