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
        'published_at',
        'image',
        'image_alt',
        'short_description',
        'content',
        'meta_title',
        'meta_description',
        'show_home',
        'status',
    ];

    protected $casts = [
        'published_at' => 'date',
        'show_home' => 'boolean',
        'status' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (Blog $blog) {
            if (empty($blog->slug)) {
                $blog->slug = static::uniqueSlug($blog->title, $blog->id);
            }
            if (empty($blog->published_at)) {
                $blog->published_at = now();
            }
        });
    }

    public static function uniqueSlug(string $title, $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'blog';
        $slug = $base;
        $i = 2;

        while (static::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderByDesc('published_at')->orderByDesc('id');
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image)
            return null;

        return str_starts_with($this->image, 'http')
            ? $this->image
            : asset('storage/' . $this->image);
    }
}