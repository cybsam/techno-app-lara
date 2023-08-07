<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTeamCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_department',
        'team_department_slug',
        'add_by',
        'user_id',
    ];
}
