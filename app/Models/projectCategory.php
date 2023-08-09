<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_category',
        'project_category_slug',
        'added_by',
    ];
}
