<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\FrontContact;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }


    public function UserProfile(){
        return view('dashboard.profile');
    }

    public function VisitWebSite(){
        return redirect()->route('frontEndIndex');
    }

    public function blank(){
        return view('dashboard.blank');
    }

    public function ContactFrontEnd(){
        $showContact = FrontContact::all()->reverse();
        return view('dashboard.Contact.index',[
            'showContact'=>$showContact,
        ]);
    }
    public function ContactFrontEndShow(Request $request, $id){
        $cntId = $id;
        $updateFrontContact = FrontContact::where('id',$cntId)->update([
            'is_seen'=>1
        ]);
        $getData = FrontContact::where('id',$cntId)->first();
        return view('dashboard.contact.view',[
            'getData'=>$getData,
        ]);
    }

    public function frontSliderImage(){
        //
    }
    public function frontSliderImageUpdate(){
        //
    }
}
