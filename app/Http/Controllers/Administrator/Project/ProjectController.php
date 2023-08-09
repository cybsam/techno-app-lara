<?php

namespace App\Http\Controllers\Administrator\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\projectCategory;
use App\Models\Project;

class ProjectController extends Controller
{
    public function showProjectList(){
        $projectCategory = projectCategory::all();
        return view('dashboard.project.index',[
            'projectCategory'=>$projectCategory,
        ]);
    }

    public function ProjectInsert(Request $request){
        dd($request->all());
    }
}
