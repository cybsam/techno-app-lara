<?php

namespace App\Http\Controllers\Administrator\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;
use App\Models\User;
use Illuminate\Support\Str;


class ProjectCategoryController extends Controller
{
    public function showCategory(){
        return view('dashboard.project.project-category');
    }
}
