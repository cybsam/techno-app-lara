<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    use HasFactory;
    protected $fillable = [
        'expertise_name',
        'expertise_description',
        'added_by',
        'is_active',
    ];
}
