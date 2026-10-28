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
        'timings',
        'swiggy_url',
        'zomato_url',
        'title',
        'subtitle',
        'urdu_name',
        'description',
        'badge_text',
        'badge_icon',
        'is_flagship',
        'amenities',
        'prep_time',
        'image',
        'tag_text',
        'tag_icon',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'sort_order'  => 'integer',
        'status'      => 'boolean',
        'is_flagship' => 'boolean',
        'amenities'   => 'array',
    ];

    /* ---- scopes ---- */

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    /* ---- accessors ---- */

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

    /* WhatsApp link with the prefilled order message */
    public function getWhatsappOrderUrlAttribute(): ?string
    {
        if (! $this->whatsapp) {
            return null;
        }

        return self::whatsappUrl($this->whatsapp)
            . '?text=' . rawurlencode("Hello Wahid Biryani, I would like to order from {$this->name}.");
    }

    /* Google Maps directions link (falls back to name when title is empty) */
    public function getDirectionsUrlAttribute(): string
    {
        return 'https://maps.google.com/?q=' . urlencode(($this->title ?: $this->name) . ' ' . $this->address);
    }

    /* "Swiggy & Zomato", "Swiggy", "Zomato" or null when neither is set */
    public function getOrderPlatformsAttribute(): ?string
    {
        return collect(['Swiggy' => $this->swiggy_url, 'Zomato' => $this->zomato_url])
            ->filter()
            ->keys()
            ->implode(' & ') ?: null;
    }

    /* First phone number, used for the "Call Now" button */
    public function getPrimaryPhoneHrefAttribute(): ?string
    {
        return $this->phone_list[0]['href'] ?? null;
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