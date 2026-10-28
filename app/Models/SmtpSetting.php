<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmtpSetting extends Model
{
    protected $fillable = [
        // SMTP connection
        'smtp_host',
        'smtp_port',
        'smtp_username',
        'smtp_password',
        'smtp_encryption',

        // Sender / Reply-to
        'from_name',
        'from_email',
        'reply_to_name',
        'reply_to_email',

        // Admin email notifications (one switch per enquiry type)
        'notify_contact_enquiry',
        'notify_feedback',
        'notify_franchise_enquiry',
    ];

    protected $casts = [
        // Secret — stored encrypted (needs APP_KEY)
        'smtp_password' => 'encrypted',

        'notify_contact_enquiry' => 'boolean',
        'notify_feedback' => 'boolean',
        'notify_franchise_enquiry' => 'boolean',
    ];

    /**
     * Always return the single settings row.
     *
     * Takes the first row whatever its id is. firstOrCreate(['id' => 1]) cannot work:
     * id is not mass assignable, so whenever the existing row's id is not 1 a brand
     * new row would be created on every call instead of updating the existing one.
     */
    public static function getInstance(): self
    {
        return static::query()->orderBy('id')->first() ?? static::create([]);
    }

    /**
     * Should the admin be emailed for this event?
     *
     * Events: contact_enquiry, feedback, franchise_enquiry
     * Usage:  SmtpSetting::getInstance()->shouldNotify('contact_enquiry')
     */
    public function shouldNotify(string $event): bool
    {
        return (bool) ($this->{'notify_' . $event} ?? false);
    }
}