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
        $request->validate([
            'project_name'=>['required'],
            'project_header_image'=>['required','mimes:jpg,jped,png,ico,gif','max:3000'],
            // 'project_category_slug'=>['required'],
            'project_keyword'=>['required'],
            'project_scope'=>['required'],
            'project_type'=>['required'],
            // 'project_location'=>['required'],
            'project_description'=>['required'],
            // 'is_ongoing'=>['required'],
        ]);

        $input = $request->all();


        if($input['project_category_slug'] != 'null'){
            if($input['is_ongoing'] == 0 || $input['is_ongoing'] == 1){
                $afterExplodeSlug = explode('.',$request->project_category_slug);
                $slug = Str::slug($request->project_name);
                $headerImage = $request->file('project_header_image');
                $randstr = Carbon::now()->format('Y-m-d-H-i-s-u');
                $headerImageNewName = $slug.'-'.$afterExplodeSlug[0].'-'.$randstr.'.'.$headerImage->getClientOriginalExtension();

                $imagePath = base_path('public/image/project/',$headerImageNewName);
                Image::make($headerImage)->save($imagePath);

                $project = new Project();
                $project->project_name = $input['project_name'];
                $project->project_slug = $slug;
                $project->project_header_image = $headerImageNewName;
                $project->project_category_slug = $afterExplodeSlug[1];
                $project->project_keyword = $input['project_keyword'];
                $project->project_scope = $input['project_scope'];
                $project->project_type = $input['project_type'];
                $project->project_location = $input['project_location'];
                $project->project_description = $request->project_description;
                $project->is_ongoing = $input['is_ongoing'];
                $project->project_added_by = Auth::user()->name();
                $projectSave = $project->save();

                if($projectSave){
                    return redirect()->back()->with('succ','New Project Upload Successfully');
                }else{
                    return redirect()->back()->with('err','Something went wrong!');
                }
            }else{
                return redirect()->back()->with('err','You are not selected Project Status, try again!');
            }
        }else{
            return redirect()->back()->with('err','You are not selected Project Category, try again!');
        }
    }
}
