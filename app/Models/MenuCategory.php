<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MenuCategory extends Model
{
    protected $fillable = ['name', 'slug', 'sort_order', 'status'];

    protected $casts = [
        'sort_order' => 'integer',
        'status'     => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (MenuCategory $category) {
            if (empty($category->slug)) {
                $category->slug = static::uniqueSlug($category->name, $category->id);
            }
        });
    }

    public static function uniqueSlug(string $name, $ignoreId = null): string
    {
        $base = Str::slug($name) ?: 'category';
        $slug = $base;
        $i = 2;

        while (static::where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }

    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}