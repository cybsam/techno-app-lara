<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_name',
        'sender_number',
        'sender_email',
        'sender_subject',
        'sender_message',
        'sender_ip',
        'is_seen',
    ];
}
