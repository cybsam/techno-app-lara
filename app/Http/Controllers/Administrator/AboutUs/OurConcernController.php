<?php

namespace App\Http\Controllers\Administrator\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OurConcernController extends Controller
{
    public function bckIndex(){
        return view('dashboard.about-us.our-concern.index');
    }
}
