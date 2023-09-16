<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrategicPartnersCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'strategic_partner_categroy',
        'strategic_partner_categroy_slug',
    ];

    
}
