<?php

namespace App\Http\Controllers\Administrator\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurConcern;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;

use Illuminate\Support\Str;

class OurConcernController extends Controller
{
    public function bckIndex(){
        $listConcern = OurConcern::all();
        return view('dashboard.about-us.our-concern.index',['listConcern'=>$listConcern,]);
    }

    public function bckIndexInsert(Request $request){
        $request->validate([
            'concern_name'=>['required','max:250','unique:our_concerns'],
            'concern_image'=>['required','mimes:png,jpg,jpeg,ico,giff','max:2048'],
            'concern_description'=>['required'],
        ]);

        $input = $request->all();
        $ConcernSlug = Str::slug($input['concern_name']);
        $randStr = Carbon::now()->format('Y-m-d-H-i-s-u');
        $imageNewName = $ConcernSlug.'-'.$randStr.'.'.$request->file('concern_image')->getClientOriginalExtension();
        $base_path = base_path('public/image/about-us/our-concern/'.$imageNewName);
        Image::make($request->file('concern_image'))->save($base_path);

        $insNewData = new OurConcern();
        $insNewData->concern_name = $input['concern_name'];
        $insNewData->concern_image = $imageNewName;
        $insNewData->concern_description = $input['concern_description'];
        $insNewData->added_by = Auth::user()->id.'-'.Auth::user()->name;
        $saveData = $insNewData->save();

        if($saveData){
            return redirect()->back()->with('concernInser','Insert Successfully');
        }else{
            return redirect()->back()->with('concernError','Something Went wrong!');
        }

    }

    public function bckIndexUpdateShow(Request $request, $concern_id){
        $concernId = $concern_id;
        $fetchConcernDB = OurConcern::where('id',$concernId)->first();
        if ($fetchConcernDB) {
            return view('dashboard.about-us.our-concern.update',[
                'fetchConcernDB'=>$fetchConcernDB,
            ]);
        }else {
            abort(403);
        }
    }

    public function bckIndexUpdate(Request $request){
        $concernImage = $request->file('concernImage');
        if($request->hasFile('concernImage')){
            $request->validate([
                'concernName'=>['required'],
                'concid'=>['required'],
                'concernStatus'=>['required'],
                'concernDescription'=>['required'],
                'concernImage'=>['required','mimes:png,jpg,jpeg,ico,gif,csv','max:1024']
            ]);
            $concernId = $request->input('concid');
            $checkDB = OurConcern::where('id',$concernId)->first();
            if($checkDB){
                // concern new name
                $ConcernSlug = Str::slug($request->input('concernName'));
                $randStr = Carbon::now()->format('Y-m-d-H-i-s-u');
                $imageNewName = $ConcernSlug.'-'.$randStr.'.'.$request->file('concernImage')->getClientOriginalExtension();
                $newLocation = base_path('public/image/about-us/our-concern/'.$imageNewName);

                // db image
                $dbImage = $checkDB->concern_image;
                $oldLocation = base_path('public/image/about-us/our-concern/'.$dbImage);
                unlink($oldLocation);

                // update database
                $updaSucc =  OurConcern::where('id',$concernId)->update([
                    'concern_image'=>$imageNewName,
                    'concern_name'=>$request->input('concernName'),
                    'concern_description'=>$request->input('concernDescription'),
                    'is_active'=>$request->input('concernStatus'),
                    'added_by'=>Auth::user()->id.'-'.Auth::user()->name,
                ]);
                if($updaSucc){
                    return redirect()->back()->with('ConcernUpdateSucc','Concern Update Successfully, check it now');
                }else{
                    return redirect()->back()->with('ConcernUpdateError','Something went wrong!!!');
                }
            }else{
                abort(403);
            }
        }else {
            $request->validate([
                'concernName'=>['required'],
                'concid'=>['required'],
                'concernStatus'=>['required'],
                'concernDescription'=>['required'],
            ]);
            $concernId = $request->input('concid');
            $checkDB = OurConcern::where('id',$concernId)->first();
            if($checkDB){
                $updaSucc =  OurConcern::where('id',$concernId)->update([
                    'concern_name'=>$request->input('concernName'),
                    'concern_description'=>$request->input('concernDescription'),
                    'is_active'=>$request->input('concernStatus'),
                    'added_by'=>Auth::user()->id.'-'.Auth::user()->name,
                ]);
                if($updaSucc){
                    return redirect()->back()->with('ConcernUpdateSucc','Concern Update Successfully, check it now');
                }else{
                    return redirect()->back()->with('ConcernUpdateError','Something went wrong!!!');
                }
            }else{
                abort(403);
            }
        }
    }
}
