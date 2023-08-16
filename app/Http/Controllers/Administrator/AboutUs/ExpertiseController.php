<?php

namespace App\Http\Controllers\Administrator\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expertise;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;

class ExpertiseController extends Controller
{
    public function expertiseIndex(){
        $fetchData = Expertise::all();
        return view('dashboard.about-us.our-expertise.index',['fetchData'=>$fetchData]);
    }
}
