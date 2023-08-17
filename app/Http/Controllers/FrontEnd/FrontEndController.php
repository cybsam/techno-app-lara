<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AboutUsInformation;
use App\Models\AboutOurTeam;
use App\Models\FrontContact;
use App\Models\Project;

class FrontEndController extends Controller
{
    public function index(){
        // $AboutUsInformation = AboutUsInformation::where('id',1)->first();
        $frontProjectShow = Project::where('is_ongoing',0)->inRandomOrder()->get();
        return view('FrontEndView.index',[
            // 'AboutUsInformation'=>$AboutUsInformation,
            'frontProjectShow'=>$frontProjectShow,
        ]);
    }



    Public function contact(){
        $AboutUsInformation = AboutUsInformation::where('id',1)->first();
        return view('FrontEndView.Contact.index',[
            'AboutUsInformation'=>$AboutUsInformation,
        ]);
    }

    public function contactStore(Request $request){
        $request->validate([
            'sender_name'=>['required'],
            'sender_number'=>['required','min:10','max:11'],
            'sender_subject'=>['required'],
            'sender_email'=>['required', 'email'],
            'sender_message'=>['required'],
        ]);

        $input = $request->all();

        $insMsg = new FrontContact();
        $insMsg->sender_name = $input['sender_name'];
        $insMsg->sender_number = $input['sender_number'];
        $insMsg->sender_email = $input['sender_email'];
        $insMsg->sender_subject = $input['sender_subject'];
        $insMsg->sender_message = $input['sender_message'];
        $insMsg->sender_ip = \Request::ip();
        $saveMsg = $insMsg->save();
        if($saveMsg){
            return redirect()->back()->with('succFrontEnd','Thanks for you message us, we will contact as soon as possible!');
        }else{
            return redirect()->back()->with('errFrontEnd','Something went wrong!, try again');
        }

    }

}
