<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionAndVission extends Model
{
    use HasFactory;
    protected $fillable = [
        'mission_image',
        'mission_description',
        'vission_image',
        'vission_description',
        'mission_vission_keyword',
        'added_by',
    ];
}
