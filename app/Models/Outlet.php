<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $fillable = [
        'name',
        'address',
        'email',
        'phones',
        'whatsapp',
        'map_url',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'status'     => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    /* "0522-2611878, +91 92366 13111" => [['label' => ..., 'href' => 'tel:+91...'], ...] */
    public function getPhoneListAttribute(): array
    {
        return collect(explode(',', (string) $this->phones))
            ->map(fn ($p) => trim($p))
            ->filter()
            ->map(fn ($p) => ['label' => $p, 'href' => 'tel:' . self::telNumber($p)])
            ->values()
            ->all();
    }

    public function getWhatsappUrlAttribute(): ?string
    {
        return $this->whatsapp ? self::whatsappUrl($this->whatsapp) : null;
    }

    /* ---- helpers (also used for the settings phone/whatsapp on the contact page) ---- */

    public static function telNumber(string $number): string
    {
        $digits = preg_replace('/\D+/', '', $number);

        if (strlen($digits) === 10) {
            $digits = '91' . $digits;
        } elseif (str_starts_with($digits, '0')) {
            $digits = '91' . ltrim($digits, '0');
        }

        return '+' . $digits;
    }

    public static function whatsappUrl(string $number): string
    {
        return 'https://wa.me/' . ltrim(self::telNumber($number), '+');
    }
}