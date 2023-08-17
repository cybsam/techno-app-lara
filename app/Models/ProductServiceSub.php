<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductServiceSub extends Model
{
    use HasFactory;
    protected $fillable = [
        '__prosername',
        '__proserslug',
        '__prosermaincateslug',
        '__proserheadimage',
        '__proserkeyword',
        '__proserdescription',
        'added_by',
        'is_active',
    ];
}
