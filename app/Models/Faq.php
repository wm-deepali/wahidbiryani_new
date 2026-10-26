<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public const TYPE_GENERAL  = 'general';
    public const TYPE_SERVICE  = 'service';
    public const TYPE_INDUSTRY = 'industry';

    public const TYPES = [
        self::TYPE_GENERAL  => 'General FAQ',
        self::TYPE_SERVICE  => 'Service Based',
        self::TYPE_INDUSTRY => 'Industries Based',
    ];

    protected $fillable = [
        'type',
        'service',
        'sub_service',
        'industry',
        'question',
        'answer',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    /* ── Scopes ── */

    public function scopeActive($query)
    {
        return $query->where('status', 1)->orderBy('sort_order')->orderBy('id');
    }

    /** Home page + main FAQ page. */
    public function scopeGeneral($query)
    {
        return $query->where('type', self::TYPE_GENERAL);
    }

    /**
     * FAQs for one service page.
     * $key is the route name of the page:
     *  - a main service page  => FAQs with that service and no sub service
     *  - a sub service page   => FAQs with that sub service
     */
    public function scopeForService($query, string $key)
    {
        return $query->where('type', self::TYPE_SERVICE)
            ->where(function ($q) use ($key) {
                $q->where('sub_service', $key)
                  ->orWhere(function ($q) use ($key) {
                      $q->where('service', $key)->whereNull('sub_service');
                  });
            });
    }

    /** FAQs for one industry page ($key = route name of the page). */
    public function scopeForIndustry($query, string $key)
    {
        return $query->where('type', self::TYPE_INDUSTRY)->where('industry', $key);
    }

    /* ── Labels for the admin ── */

    public function getTypeLabelAttribute(): string
    {
        return self::TYPES[$this->type] ?? $this->type;
    }

    public function getTargetLabelAttribute(): string
    {
        if ($this->type === self::TYPE_SERVICE) {
            $service = config('faq_pages.services')[$this->service] ?? null;
            $main    = $service['name'] ?? $this->service;

            if ($this->sub_service) {
                return $main . ' › ' . ($service['subs'][$this->sub_service] ?? $this->sub_service);
            }

            return $main . ' (main page)';
        }

        if ($this->type === self::TYPE_INDUSTRY) {
            return config('faq_pages.industries')[$this->industry] ?? (string) $this->industry;
        }

        return 'Home page & FAQ page';
    }
}