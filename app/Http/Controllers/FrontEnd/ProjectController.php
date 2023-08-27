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


    public function CompleteProjectList(Request $request, $project_cate_slug){
        $pro_slug = $project_cate_slug;
        $categoryWiseProjectList = Project::where('is_ongoing','0')->where('project_category_slug',$pro_slug)->get();

        if ($pro_slug && $categoryWiseProjectList) {
            return view('FrontEndView.project.categorywise-project',[
                'proejct_slug'=>$project_cate_slug,
                'categoryWiseProjectList'=>$categoryWiseProjectList,
            ]);
        }else{
            abort(404);
        }

    }

    public function ProjectDetailsShow(Request $request, $project_slug){
        $project_slug = $project_slug;
        $projectDetaisView =  Project::where('project_slug',$project_slug)->first();

        

        if ($projectDetaisView) {
            // share project
            $currentUrl = URL()->current();
            $projectHeader = $projectDetaisView->project_name;

            $socialShareProject = \Share::page(
                $currentUrl,
                $projectHeader
            )->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->reddit()
            ->telegram();
            return view('FrontEndView.project.project-details',[
                'projectDetaisView'=>$projectDetaisView,
                'socialShareProject'=>$socialShareProject,
            ]);
        }else{
            abort(404);
        }
        
    }
}
