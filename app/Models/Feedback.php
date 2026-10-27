<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks'; // "feedback" is uncountable in Laravel's pluralizer

    protected $fillable = [
        'name',
        'phone',
        'email',
        'outlet',
        'message',
        'ip_address',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}