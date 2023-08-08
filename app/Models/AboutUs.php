<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'description',
        'keyword_title',
        'keyword_description',
        'keyword_author',
        'added_by',
    ];
}
