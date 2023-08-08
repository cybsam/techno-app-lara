<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutOurTeam extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'department',
        'degination',
        'email',
        'mobile',
        'whatsapp',
        'image',
        'is_active',
        'add_by',
        'user_id',
    ];
}
