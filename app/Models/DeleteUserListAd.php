<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeleteUserListAd extends Model
{
    use HasFactory;

    protected $fullable = [
        'name',
        'email',
        'password',
        'username',
        'user_image',
        'role_int',
        'role',
        'last_seen',
        'usercreate',
    ];
}
