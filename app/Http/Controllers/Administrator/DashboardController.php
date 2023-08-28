<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\FrontContact;
use App\Models\ProductService;
use Carbon\Carbon as CarbonCarbon;
use Image;

class DashboardController extends Controller
{
    public function index(){
        $CountAllUser = User::all()->count();
        $fetchProductAndServiceLit = ProductService::where('is_active','1')->get();
        return view('dashboard.index',[
            'CountAllUser'=>$CountAllUser,
            'fetchProductAndServiceLit'=>$fetchProductAndServiceLit,
        ]);
    }


    public function UserProfile(){
        return view('dashboard.profile');
    }

    public function UserProfileUpdateNameImage(Request $request){
        $userImage = $request->file('profileImageUpload');
        
        if($request->hasFile('profileImageUpload')){
            $request->validate([
                'changeFullName'=>['required','string'],
                'profileImageUpload'=>['required','mimes:jpg,jped,png,ico,gif','max:2048']
            ]);
            
            $randStr = Carbon::now()->format('Y-m-d-H-i-s-u');
            $newImageName = Auth::user()->username.'-'.$randStr.'.'.$userImage->getClientOriginalExtension();
            $NewImageLocation = base_path('public/image/users/'.$newImageName);

            $oldUserImage = Auth::user()->user_image;
            $imageLocation = base_path('public/image/users/'.$oldUserImage);
            unlink($imageLocation);

            Image::make($userImage)->save($NewImageLocation);

            $userUpdate = User::where('id',Auth::user()->id)->update([
                'name'=>$request->input('changeFullName'),
                'user_image'=>$newImageName,
            ]);
            if($userUpdate){
                return redirect()->back()->with('userProfileUpdateDone','User Profile Update Done');
            }else{
                return redirect()->back()->with('userProfileUpdateError','Something went wrong!');
            }
        }else{
            $request->validate([
                'changeFullName'=>['required','string'],
            ]);
            $userUpdate = User::where('id',Auth::user()->id)->update([
                'name'=>$request->input('changeFullName'),
            ]);
            if($userUpdate){
                return redirect()->back()->with('userProfileUpdateDone','User Profile Update Done');
            }else{
                return redirect()->back()->with('userProfileUpdateError','Something went wrong!');
            }
        }
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
        return view('dashboard.settings.front-slider.index');
    }
    public function frontSliderImageUpdate(){
        //
    }
}
