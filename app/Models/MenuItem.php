<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'menu_category_id',
        'title',
        'serving',
        'price',
        'description',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'status'     => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(MenuCategory::class, 'menu_category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    // "180" => "₹180"; text prices such as "MRP" are shown as they are
    public function displayPrice(string $symbol = '₹'): string
    {
        $price = trim((string) $this->price);

        if ($price === '') {
            return '';
        }

        return is_numeric($price) ? $symbol . $price : $price;
    }
}