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
     * Every event here is an admin notification, sent when a visitor submits a
     * website form. The recipient is the Support Email (or Admin Email) from
     * General Settings. The on/off switch for each event lives in smtp_settings
     * (notify_*); a template must ALSO be enabled here for its mail to go out.
     */
    public static array $eventKeys = [
        'contact-enquiry',
        'feedback',
        'franchise-enquiry',
    ];

    /**
     * Maps each event key to its switch column in smtp_settings.
     * Use with SmtpSetting::shouldNotify() (pass the key's value below).
     */
    public static array $notifyEvents = [
        'contact-enquiry' => 'contact_enquiry',
        'feedback' => 'feedback',
        'franchise-enquiry' => 'franchise_enquiry',
    ];

    /**
     * Placeholders available in every template.
     */
    protected static function commonVars(): array
    {
        return [
            '{brand_name}' => 'Brand Name',
            '{site_url}' => 'Website URL',
            '{logo_url}' => 'Logo URL',
            '{submitted_at}' => 'Date & Time Submitted',
            '{ip_address}' => 'Visitor IP Address',
        ];
    }

    /**
     * Human-readable metadata for each event key.
     */
    public static function eventMeta(): array
    {
        return [
            'contact-enquiry' => [
                'label' => 'Contact Enquiry',
                'icon' => 'fa fa-envelope',
                'desc' => 'Sent to the admin whenever someone submits the Contact Us form.',
                'default_subject' => 'New contact enquiry from {name}',
                'default_preview' => '{name} has sent a message through the Contact Us form.',
                'default_body' => '<p>Hello Admin,</p>
<p>You have received a new enquiry through the <strong>Contact Us</strong> form on {brand_name}.</p>
<table cellpadding="6" cellspacing="0" border="0">
<tr><td><strong>Name</strong></td><td>{name}</td></tr>
<tr><td><strong>Email</strong></td><td>{email}</td></tr>
<tr><td><strong>Phone</strong></td><td>{phone}</td></tr>
<tr><td><strong>Request Type</strong></td><td>{request_type}</td></tr>
<tr><td><strong>Submitted</strong></td><td>{submitted_at}</td></tr>
</table>
<p><strong>Message:</strong><br>{message}</p>',
                'vars' => [
                    '{name}' => 'Visitor Name',
                    '{email}' => 'Visitor Email',
                    '{phone}' => 'Visitor Phone',
                    '{request_type}' => 'Request Type',
                    '{message}' => 'Message',
                ] + self::commonVars(),
                'extras' => null,
                'audience' => 'admin',
            ],
            'feedback' => [
                'label' => 'Feedback & Suggestions',
                'icon' => 'fa fa-comment-dots',
                'desc' => 'Sent to the admin whenever someone submits the Feedback & Suggestions form.',
                'default_subject' => 'New feedback from {name} ({outlet})',
                'default_preview' => '{name} has shared feedback about the {outlet} outlet.',
                'default_body' => '<p>Hello Admin,</p>
<p>New feedback has been submitted on {brand_name}.</p>
<table cellpadding="6" cellspacing="0" border="0">
<tr><td><strong>Name</strong></td><td>{name}</td></tr>
<tr><td><strong>Email</strong></td><td>{email}</td></tr>
<tr><td><strong>Phone</strong></td><td>{phone}</td></tr>
<tr><td><strong>Outlet</strong></td><td>{outlet}</td></tr>
<tr><td><strong>Submitted</strong></td><td>{submitted_at}</td></tr>
</table>
<p><strong>Feedback:</strong><br>{message}</p>',
                'vars' => [
                    '{name}' => 'Visitor Name',
                    '{email}' => 'Visitor Email',
                    '{phone}' => 'Visitor Phone',
                    '{outlet}' => 'Outlet / Branch',
                    '{message}' => 'Feedback Message',
                ] + self::commonVars(),
                'extras' => null,
                'audience' => 'admin',
            ],
            'franchise-enquiry' => [
                'label' => 'Franchise Enquiry',
                'icon' => 'fa fa-handshake',
                'desc' => 'Sent to the admin whenever someone submits the Franchise Enquiry form.',
                'default_subject' => 'New franchise enquiry from {name} ({city})',
                'default_preview' => '{name} from {city} is interested in a franchise.',
                'default_body' => '<p>Hello Admin,</p>
<p>A new <strong>franchise enquiry</strong> has been received on {brand_name}.</p>
<table cellpadding="6" cellspacing="0" border="0">
<tr><td><strong>Name</strong></td><td>{name}</td></tr>
<tr><td><strong>Email</strong></td><td>{email}</td></tr>
<tr><td><strong>Phone</strong></td><td>{phone}</td></tr>
<tr><td><strong>City</strong></td><td>{city}</td></tr>
<tr><td><strong>Budget</strong></td><td>{budget}</td></tr>
<tr><td><strong>Submitted</strong></td><td>{submitted_at}</td></tr>
</table>
<p><strong>Message:</strong><br>{message}</p>',
                'vars' => [
                    '{name}' => 'Visitor Name',
                    '{email}' => 'Visitor Email',
                    '{phone}' => 'Visitor Phone',
                    '{city}' => 'City',
                    '{budget}' => 'Investment Budget',
                    '{message}' => 'Message',
                ] + self::commonVars(),
                'extras' => null,
                'audience' => 'admin',
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