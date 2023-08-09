<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_name',
        'project_slug',
        'project_header_image',
        'project_category_slug',
        'project_keyword',
        'project_scope',
        'project_type',
        'project_location',
        'project_description',
        'is_ongoing',
        'project_added_by',
    ];
}
