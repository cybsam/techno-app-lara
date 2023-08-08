<?php

namespace App\Http\Controllers\Administrator\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\AboutUs;
use App\Models\MissionAndVission;

class AboutUsController extends Controller
{
    public function aboutUs(){
        $backAbout = AboutUs::where('id','1')->first();
        return view('dashboard.about-us.about-us.index',[
            'backAbout'=>$backAbout,
        ]);
    }

    public function missionAndVission(){
        $backView = MissionAndVission::where('id','1')->first();
        return view('dashboard.about-us.our-mission-vission.index',['backView'=>$backView]);
    }
}
