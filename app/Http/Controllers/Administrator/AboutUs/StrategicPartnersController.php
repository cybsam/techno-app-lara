<?php

namespace App\Http\Controllers\Administrator\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;
use App\Models\User;
use Illuminate\Support\Str;

use App\Models\StrategicPartner;

class StrategicPartnersController extends Controller
{
    public function IndexPartners(){
        $listPartners = StrategicPartner::all();
        return view('dashboard.about-us.strategic-partners.index',[
            'listPartners'=>$listPartners,
        ]);
    }

    public function InsertPartners(Request $request){
        //
    }

    public function IndexPartnersSave(Request $request){
        //
    }
    

    public function IndexPartnersUpdateSh(Request $request){
        //
    }

    public function IndexPartnersUpdateSave(Request $request){
        //
    }

    public function IndexPartnersDelete(Request $request){
        //
    }
}
