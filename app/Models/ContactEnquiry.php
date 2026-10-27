<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactEnquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'request_type',
        'message',
        'ip_address',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}