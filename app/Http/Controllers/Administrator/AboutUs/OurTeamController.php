<?php

namespace App\Http\Controllers\Administrator\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\EmployeeTeamCategory;

class OurTeamController extends Controller
{
    public function index(){
        return view('dashboard.about-us.our-team.index');
    }





    public function TeamManagement(){
        return view('dashboard.settings.team-management.team-category');
    }
    public function TeamManagementIns(Request $request){
        $request->validate([
            'team_department_slug' => ['required','unique:employee_team_categories']
        ]);

        $input = $request->all();
        $userId = Auth::user()->id;
        $userName = Auth::user()->name;
        $slug = Str::slug($input['team_department_slug']);

        $inpData = new EmployeeTeamCategory();
        $inpData->team_department = $input['team_department_slug'];
        $inpData->team_department_slug = $slug;
        $inpData->add_by = $userName;
        $inpData->user_id = $userId;
        $save = $inpData->save();

        if($save){
            return redirect()->back()->with('succ','Insert Successfully');
        }else{
            return redirect()->back()->with('err','Something went wrong!');
        }

    }
}
