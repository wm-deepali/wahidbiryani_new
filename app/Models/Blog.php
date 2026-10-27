<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'urdu_accent',
        'short_description',
        'image',
        'banner_image',
        'content',
        'author_name',
        'author_title',
        'author_image',
        'read_time',
        'published_at',
        'meta_title',
        'meta_description',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'read_time'    => 'integer',
        'sort_order'   => 'integer',
        'status'       => 'boolean',
        'published_at' => 'date',
    ];

    /* ---------- Boot: auto slug ---------- */

    protected static function booted(): void
    {
        static::saving(function (Blog $blog) {
            if (empty($blog->slug)) {
                $blog->slug = static::uniqueSlug($blog->title, $blog->id);
            }
        });
    }

    public static function uniqueSlug(string $title, $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'blog';
        $slug = $base;
        $i = 2;

        while (static::where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /* ---------- Scopes ---------- */

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    // Admin list order
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('id');
    }

    // Public order: newest first
    public function scopeLatestFirst($query)
    {
        return $query->orderByDesc('published_at')->orderByDesc('id');
    }

    /* ---------- Accessors ---------- */

    // Uploaded files live on the public disk (storage/app/public) => /storage/...
    // Legacy/static paths (assets/..., uploads/...) are still served from public/.
    private function fileUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://', 'assets/', 'uploads/'])) {
            return Str::startsWith($path, 'http') ? $path : asset($path);
        }

        return asset('storage/' . ltrim($path, '/'));
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->fileUrl($this->image);
    }

    public function getBannerImageUrlAttribute(): ?string
    {
        return $this->fileUrl($this->banner_image);
    }

    // Featured image on the detail page; falls back to the card image
    public function getBannerUrlAttribute(): ?string
    {
        return $this->banner_image_url ?: $this->image_url;
    }

    public function getAuthorImageUrlAttribute(): ?string
    {
        return $this->fileUrl($this->author_image);
    }

    // "Heritage, Recipes" => ['Heritage', 'Recipes']
    public function getCategoriesAttribute(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', (string) $this->category))));
    }

    // First category for the listing card tag
    public function getPrimaryCategoryAttribute(): ?string
    {
        return $this->categories[0] ?? null;
    }
}