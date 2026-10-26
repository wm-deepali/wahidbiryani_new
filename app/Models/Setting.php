<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'tagline',
        'header_logo',
        'footer_logo',
        'admin_login_logo',
        'admin_dashboard_logo',
        'favicon',
        'admin_email',
        'support_email',
        'phone',
        'whatsapp',
        'business_address',
        'business_hours',
        'footer_description',
        'footer_copyright',
        'google_map_url',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'youtube',
        'pinterest',
        'currency',
        'currency_symbol',
        'timezone',
        'maintenance_mode',
        'admin_session_timeout',
    ];

    protected $casts = [
        'maintenance_mode' => 'boolean',
    ];

    // ── Logos / favicon ─────────────────────────────────────────────────────

    private function storageUrl(?string $path, ?string $fallback = null): ?string
    {
        if (filled($path)) {
            return asset('storage/' . ltrim($path, '/'));
        }

        return $fallback ? asset($fallback) : null;
    }

    public function getHeaderLogoUrlAttribute(): string
    {
        return $this->storageUrl($this->header_logo, 'assets/images/logo.png');
    }

    // Footer logo, else header logo, else the default
    public function getFooterLogoUrlAttribute(): string
    {
        return $this->storageUrl($this->footer_logo)
            ?? $this->header_logo_url;
    }

    public function getAdminLoginLogoUrlAttribute(): string
    {
        return $this->storageUrl($this->admin_login_logo, 'assets/images/logo.png');
    }

    public function getAdminDashboardLogoUrlAttribute(): string
    {
        return $this->storageUrl($this->admin_dashboard_logo)
            ?? $this->admin_login_logo_url;
    }

    // null when no favicon is uploaded, so the <link> is not printed
    public function getFaviconUrlAttribute(): ?string
    {
        return $this->storageUrl($this->favicon);
    }

    // ── Contact helpers ─────────────────────────────────────────────────────

    // Public email: support email first, admin email as fallback
    public function getContactEmailAttribute(): ?string
    {
        return $this->support_email ?: ($this->admin_email ?: null);
    }

    public function getPhoneHrefAttribute(): ?string
    {
        if (!filled($this->phone)) {
            return null;
        }

        $number = preg_replace('/[^0-9+]/', '', $this->phone);

        return $number ? 'tel:' . $number : null;
    }

    // 10-digit Indian numbers get the 91 prefix automatically
    public function getWhatsappUrlAttribute(): ?string
    {
        $digits = preg_replace('/\D+/', '', (string) $this->whatsapp);

        if ($digits === '') {
            return null;
        }

        if (strlen($digits) === 10) {
            $digits = '91' . $digits;
        }

        return 'https://wa.me/' . $digits;
    }
}