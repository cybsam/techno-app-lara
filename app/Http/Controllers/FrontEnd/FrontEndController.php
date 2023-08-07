<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AboutUsInformation;

class FrontEndController extends Controller
{
    public function index(){
        $AboutUsInformation = AboutUsInformation::where('id',1)->first();
        return view('FrontEndView.index',[
            'AboutUsInformation'=>$AboutUsInformation,
        ]);
    }



    Public function contact(){
        $AboutUsInformation = AboutUsInformation::where('id',1)->first();
        return view('FrontEndView.Contact.index',[
            'AboutUsInformation'=>$AboutUsInformation,
        ]);
    }

    public function aboutUs(){
        dd('hey, man!');
    }
    public function missionAndVission(){
        dd('hey, man!');
    }
    public function OurTeam(){
        $AboutUsInformation = AboutUsInformation::where('id',1)->first();
        return view('FrontEndView.about-us.our-team.index',[
            'AboutUsInformation'=>$AboutUsInformation,
        ]);
    }
    public function OurConcern(){
        dd('hey, man!');
    }
    public function ourExpertise(){
        dd('hey, man!');
    }
    public function strategicPartners(){
        dd('hey, man!');
    }
}
