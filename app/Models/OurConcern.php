<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurConcern extends Model
{
    use HasFactory;

    protected $fillable = [
        'concern_name',
        'concern_image',
        'concern_description',
        'added_by',
        'is_active',
    ];
}
