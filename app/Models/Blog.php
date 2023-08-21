<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        '__blog_name',
        '__blog_slug',
        '__blog_header_image',
        '__blog_meta_title',
        '__blog_meta_keyword',
        '__blog_short_description',
        '__blog_description',
        '__blog_added_by',
        '__blog_status',
    ];
}
