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
        
    }
}
