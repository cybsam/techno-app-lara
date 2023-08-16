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
}
