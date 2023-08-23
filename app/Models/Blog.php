<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Blog extends Model implements Viewable
{
    use HasFactory;
    use InteractsWithViews;
    use Commentable;
    
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
