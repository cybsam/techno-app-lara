<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AboutUsInformation;
use App\Models\AboutOurTeam;

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

}
