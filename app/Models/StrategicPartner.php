<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrategicPartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'strategic_partners_name',
        'strategic_partners_logo',
        'strategic_partners_about',
        'strategic_partners_addedby',
        'is_active',
    ];
}
