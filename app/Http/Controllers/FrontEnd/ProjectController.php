<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;
use App\Models\projectCategory;
use App\Models\Project;

class ProjectController extends Controller
{
    public function onGoingProject(){
        $onGoingProject = Project::where('is_ongoing','1')->get()->reverse();
        return view('FrontEndView.project.onging',[
            'onGoingProject'=>$onGoingProject,
        ]);
    }
}
