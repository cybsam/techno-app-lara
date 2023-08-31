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

    public function missionAndVissionShow($mission_vission_id){
        $id = $mission_vission_id;
        if($id != 1){
            abort(403);
        }else{
            $backView = MissionAndVission::where('id','1')->first();
            return view('dashboard.about-us.our-mission-vission.update',[
                'backView'=>$backView,
            ]);
        }
    }

    public function missionAndVissionUpdate(Request $request){
        $request->validate([
            'keyword'=>['required'],
            'missionDescription'=>['required'],
            'vissionDescription'=>['required'],
        ]);

        if($request->hasFile('missionImage') || $request->hasFile('vissionImage')){
            $request->validate([
                'missionImage'=>['mimes:png,jpg,jpeg,gif,ico,csv'],
                'vissionImage'=>['mimes:png,jpg,jpeg,gif,ico,csv'],
            ]);
            $checkDBImg = MissionAndVission::where('id','1')->first();
            $old_pathMissionImage = base_path('public/image/about-us/mission-vission/'.$checkDBImg->mission_image);
            $oldPathVissionImage = base_path('public/image/about-us/mission-vission/'.$checkDBImg->vission_image);
            if($request->hasFile('missionImage')){
                $NewImageName = 'missionImage'.'.'.$request->file('missionImage')->getClientOriginalExtension();
                $newImageLink = base_path('public/image/about-us/mission-vission/'.$NewImageName);
                unlink($old_pathMissionImage);
                Image::make($request->file('missionImage'))->save($newImageLink);
                $miss = MissionAndVission::where('id','1')->update([
                    'mission_description'=>$request->input('missionDescription'),
                    'mission_image'=>$NewImageName,
                    'vission_description'=>$request->input('vissionDescription'),
                    'mission_vission_keyword'=>$request->input('keyword'),
                    'added_by'=>Auth::user()->id.'-'.Auth::user()->name,
                ]);
                if($miss){
                    return redirect()->back()->with('MissionVissionUpdateComplete','Mission and vission update complete!');
                }else{
                    return redirect()->back()->with('MissionVissionUpdateError','Something went wrong!');
                }
            }elseif($request->hasFile('vissionImage')){
                $NewImageName = 'vissionImage'.'.'.$request->file('vissionImage')->getClientOriginalExtension();
                $newImageLink = base_path('public/image/about-us/mission-vission/'.$NewImageName);
                unlink($oldPathVissionImage);
                Image::make($request->file('vissionImage'))->save($newImageLink);
                $miss = MissionAndVission::where('id','1')->update([
                    'mission_description'=>$request->input('missionDescription'),
                    'vission_image'=>$NewImageName,
                    'vission_description'=>$request->input('vissionDescription'),
                    'mission_vission_keyword'=>$request->input('keyword'),
                    'added_by'=>Auth::user()->id.'-'.Auth::user()->name,
                ]);
                if($miss){
                    return redirect()->back()->with('MissionVissionUpdateComplete','Mission and vission update complete!');
                }else{
                    return redirect()->back()->with('MissionVissionUpdateError','Something went wrong!');
                }
            }
        }else{
            $miss = MissionAndVission::where('id','1')->update([
                'mission_description'=>$request->input('missionDescription'),
                'vission_description'=>$request->input('vissionDescription'),
                'mission_vission_keyword'=>$request->input('keyword'),
                'added_by'=>Auth::user()->id.'-'.Auth::user()->name,
            ]);
            if($miss){
                return redirect()->back()->with('MissionVissionUpdateComplete','Mission and vission update complete!');
            }else{
                return redirect()->back()->with('MissionVissionUpdateError','Something went wrong!');
            }
        }
    }
}
