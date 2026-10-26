<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactEnquiry extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'company',
        'phone',
        'service',
        'message',
        'status',
        'ip_address',
        'user_agent',
        'mobile_verified',
        'mobile_verified_at',
        'admin_notified_at'
    ];
}