<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AboutUsInformation;
use App\Models\AboutOurTeam;
use App\Models\AboutUs;
use App\Models\MissionAndVission;
use App\Models\OurConcern;
use App\Models\Expertise;

class AboutController extends Controller
{
    public function aboutUs(){
        $fetchAboutData = AboutUs::where('id','1')->firstOrFail();
        return view('FrontEndView.about-us.about-us',[
            'fetchAboutData'=>$fetchAboutData,
        ]);
    }
    public function missionAndVission(){
        $missionAndVission = MissionAndVission::where('id','1')->firstOrFail();
        return view('FrontEndView.about-us.our-mission-vission',[
            'missionAndVission'=>$missionAndVission,
        ]);
    }
    public function OurTeam(){
        // $AboutUsInformation = AboutUsInformation::where('id',1)->first();
        $management = AboutOurTeam::where('department','management')->get();
        $project_engineering_operation_department = AboutOurTeam::where('department','project-engineering-operation-department')->get();
        $admin_operation = AboutOurTeam::where('department','admin-operation')->get();
        $business_development = AboutOurTeam::where('department','business-development')->get();
        $information_technology_design = AboutOurTeam::where('department','information-technology-design')->get();
        $support_team_electrical_maintenance = AboutOurTeam::where('department','support-team-electrical-maintenance')->get();
        $development = AboutOurTeam::where('department','development')->get();
        return view('FrontEndView.about-us.our-team',[
            // 'AboutUsInformation'=>$AboutUsInformation,
            'management'=>$management,
            'project_engineering_operation_department'=>$project_engineering_operation_department,
            'admin_operation'=>$admin_operation,
            'business_development'=>$business_development,
            'information_technology_design'=>$information_technology_design,
            'support_team_electrical_maintenance'=>$support_team_electrical_maintenance,
            'development'=>$development,
        ]);
    }
    public function OurConcern(){
        $fetchFromDb = OurConcern::where('is_active','0')->get();

        return view('FrontEndView.about-us.our-concern',['fetchFromDb'=>$fetchFromDb]);
    }
    public function ourExpertise(){
        $expertiseFetch = Expertise::where('is_active','0')->get();
        return view('FrontEndView.about-us.our-expertise',['expertiseFetch'=>$expertiseFetch]);
    }
    public function strategicPartners(){
        return view('FrontEndView.about-us.our-strategic-partners');
    }
}
