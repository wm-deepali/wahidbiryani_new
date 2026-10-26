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

        // Admin recipients — Business / Service enquiry
        'enquiry_admin_to',
        'enquiry_admin_cc',

        // Admin recipients — Career applications
        'career_admin_to',
        'career_admin_cc',

        // Email event toggles
        'customer_thank_you',
        'candidate_thank_you',
        'admin_customer_detail',
        'admin_candidate_detail',
    ];

    protected $casts = [
        // Secret — stored encrypted (needs APP_KEY)
        'smtp_password' => 'encrypted',

        'customer_thank_you' => 'boolean',
        'candidate_thank_you' => 'boolean',
        'admin_customer_detail' => 'boolean',
        'admin_candidate_detail' => 'boolean',
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
     * Is an email event toggled on here?
     * The matching EmailTemplate must also be enabled for customer/candidate
     * thank-you mails (see EmailTemplate::active()).
     *
     * Events: customer_thank_you, candidate_thank_you,
     *         admin_customer_detail, admin_candidate_detail
     */
    public function shouldSend(string $event): bool
    {
        return (bool) ($this->{$event} ?? false);
    }

    /**
     * Valid cc addresses as an array (comma or semicolon separated in DB).
     */
    public function enquiryCcList(): array
    {
        return self::splitEmails($this->enquiry_admin_cc);
    }

    public function careerCcList(): array
    {
        return self::splitEmails($this->career_admin_cc);
    }

    protected static function splitEmails(?string $value): array
    {
        $parts = preg_split('/[,;]+/', (string) $value) ?: [];

        return array_values(array_filter(
            array_map('trim', $parts),
            fn ($email) => filter_var($email, FILTER_VALIDATE_EMAIL)
        ));
    }
}