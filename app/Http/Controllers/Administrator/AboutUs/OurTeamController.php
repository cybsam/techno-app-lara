<?php

namespace App\Http\Controllers\Administrator\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\EmployeeTeamCategory;
use App\Models\EmployeeTeamSubCategory;

class OurTeamController extends Controller
{
    public function index(){
        $empSectionCategory = EmployeeTeamCategory::all()->reverse();
        $empDeginationCategory = EmployeeTeamSubCategory::all()->reverse();
        return view('dashboard.about-us.our-team.index',[
            'empSectionCategory'=>$empSectionCategory,
            'empDeginationCategory'=>$empDeginationCategory,
        ]);
    }





    public function TeamManagement(){
        $getData = EmployeeTeamCategory::all()->reverse();
        
        return view('dashboard.settings.team-management.team-category',[
            'getData'=>$getData,
            
        ]);
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
    public function TeamManagementDegination(){
        $allTeam = EmployeeTeamSubCategory::all()->reverse();
        return view('dashboard.settings.team-management.team-sub-category',[
            'allTeam'=>$allTeam,
        ]);
    }
    public function TeamManagementDeginationInsert(Request $request){
        
        $request->validate([
            'team_department_sub_slug'=>['required','unique:employee_team_sub_categories'],
        ]);

        $input = $request->all();
        $slug = Str::slug($input['team_department_sub_slug']);
        $userId = Auth::user()->id;
        $userName = Auth::user()->name;

        $fetchData = explode('.',$input['manegement-team']);

        $getDataFromDb = EmployeeTeamCategory::where('id',$fetchData[0])->where('team_department_slug',$fetchData[1])->first();
        if ($getDataFromDb) {
            $db_slug = $getDataFromDb->team_department_slug;
            $db_id = $getDataFromDb->id;
            $insData = new EmployeeTeamSubCategory();
            $insData->team_department_sub = $input['team_department_sub_slug'];
            $insData->team_department_sub_slug = $slug;
            $insData->team_department_id = $fetchData[0];
            $insData->team_department_slug = $fetchData[1];
            $insData->user_id = $userId;
            $insDataSave = $insData->save();
            if ($insDataSave) {
                return redirect()->back()->with('succ','insert successfully');
            }else {
                return redirect()->back()->with('err','Something went wrong!');
            }
        }else{
            return redirect()->back()->with('err','database not match!');
        }
        
    }
}
