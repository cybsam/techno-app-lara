<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AboutUsInformation;

class FrontEndController extends Controller
{
    public function index(){
        // $AboutUsInformation = AboutUsInformation::where('id',1)->first();
        return view('FrontEndView.index',[
            // 'AboutUsInformation'=>$AboutUsInformation,
        ]);
    }



    Public function contact(){
        // $AboutUsInformation = AboutUsInformation::where('id',1)->first();
        return view('FrontEndView.Contact.index',[
            // 'AboutUsInformation'=>$AboutUsInformation,
        ]);
    }

    public function aboutUs(){
        return view('FrontEndView.about-us.about-us');
    }
    public function missionAndVission(){
        return view('FrontEndView.about-us.our-mission-vission');
    }
    public function OurTeam(){
        // $AboutUsInformation = AboutUsInformation::where('id',1)->first();
        return view('FrontEndView.about-us.our-team',[
            // 'AboutUsInformation'=>$AboutUsInformation,
        ]);
    }
    public function OurConcern(){
        return view('FrontEndView.about-us.our-concern');
    }
    public function ourExpertise(){
        return view('FrontEndView.about-us.our-expertise');
    }
    public function strategicPartners(){
        return view('FrontEndView.about-us.our-strategic-partners');
    }
}
