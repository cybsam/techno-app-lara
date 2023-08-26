<?php

namespace App\Http\Controllers\Administrator\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Image;
use Mail;
use App\Models\AboutUsInformation;

class AboutUsInformationController extends Controller
{
    public function index(){
        $companyInfo = AboutUsInformation::where('id',1)->first();
        return view('dashboard.settings.aboutusinfo.index',[
            'companyInfo'=>$companyInfo
        ]);
    }

    public function indexUpdate(Request $request, $aboutusinfo_id){
        $aboutUsInfoId = $aboutusinfo_id;
        $checkDBFromId = AboutUsInformation::where('id',$aboutUsInfoId)->first();
        if($checkDBFromId){
            return view('dashboard.settings.aboutusinfo.update',['checkDBFromId'=>$checkDBFromId]);
        }else{
            abort(403);
        }
    }

    public function updateInformation(Request $request){
        
        $aboutUsInfoId = $request->input('id');
        $aboutUsInfoDbCheck = AboutUsInformation::where('id',$aboutUsInfoId)->update([
            'company_name'=>$request->input('company_name'),
            'company_web'=>$request->input('company_web'),
            'company_email'=>$request->input('company_email'),
            'company_office_time'=>$request->input('office_time'),
            'company_header'=>$request->input('company_header'),
            'company_description'=>$request->input('company_description'),
            'company_address_1'=>$request->input('company_address_1'),
            'company_address_2'=>$request->input('company_address_2'),
            'company_mobile_1'=>$request->input('company_mobile_1'),
            'company_mobile_2'=>$request->input('company_mobile_2'),
            'company_telephone'=>$request->input('company_tele'),
            'company_facebook'=>$request->input('facebook_page'),
            'company_twitter'=>$request->input('twitter_username'),
            'company_linkedin'=>$request->input('linkedin_user'),
            'company_telegram'=>$request->input('telegram_link'),
            'company_whatsapp'=>$request->input('whatsapp_number'),
            'company_youtube'=>$request->input('youtube_channel'),
            'update_by'=>Auth::user()->name,
            'user_id'=>Auth::user()->id,
        ]);

        return redirect()->back()->with('informatioUpdateSuccess','About us, our information update successfully.');

    }
}
