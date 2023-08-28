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

    public function aboutUsShowData(){
        $showDataAboutUs = AboutUs::where('id',1)->first();
        return view('dashboard.about-us.about-us.update',[
            'showDataAboutUs'=>$showDataAboutUs,
        ]);
    }

    public function aboutUsUpdate(Request $request){
        if($request->hasFile('aboutUsImage')){
            $request->validate([
                'aboutUsImage'=>['required','mimes:png,jpg,jpeg,giff, ico', 'max:2048'],
                'aboutUskeywordTitle'=>['required'],
                'aboutUskeywordDescription'=>['required'],
                'aboutUsOnfo'=>['required'],
            ]);
            $FormImage = $request->file('aboutUsImage');
            $NewImageName = 'about-us'.'.'.$FormImage->getClientOriginalExtension();
            $newImageLocation = base_path('public/image/about-us/about-us/'.$NewImageName);

            $aboutUsDataFromnDb = AboutUs::where('id',1)->first();
            $oldImagePath = base_path('public/image/about-us/about-us/'.$aboutUsDataFromnDb->image);
            unlink($oldImagePath);

            Image::make($FormImage)->save($newImageLocation);

            AboutUs::where('id',1)->update([
                'image'=>$NewImageName,
                'description'=>$request->input('aboutUsOnfo'),
                'keyword_title'=>$request->input('aboutUskeywordTitle'),
                'keyword_description'=>$request->input('aboutUskeywordDescription'),
                'keyword_author'=>Auth::user()->name,
            ]);
            return redirect()->back()->with('AboutUsInformationUpdateSucc','About Us Information Update success!');
        }else{
            $request->validate([
                
                'aboutUskeywordTitle'=>['required'],
                'aboutUskeywordDescription'=>['required'],
                'aboutUsOnfo'=>['required'],
            ]);
            AboutUs::where('id',1)->update([
                
                'description'=>$request->input('aboutUsOnfo'),
                'keyword_title'=>$request->input('aboutUskeywordTitle'),
                'keyword_description'=>$request->input('aboutUskeywordDescription'),
                'keyword_author'=>Auth::user()->name,
            ]);
            return redirect()->back()->with('AboutUsInformationUpdateSucc','About Us Information Update success!');
        }
    }

    public function missionAndVission(){
        $backView = MissionAndVission::where('id','1')->first();
        return view('dashboard.about-us.our-mission-vission.index',['backView'=>$backView]);
    }
}
