<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTeamSubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_department_sub',
        'team_department_sub_slug',
        'team_department_id',
        'team_department_slug',
        'user_id',
    ];

    public function EmployeeTeamCategory(){
        return $this->belongsTo(EmployeeTeamCategory::class);
    }
}
