<?php

namespace App\Http\Controllers\Administrator\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OurTeamController extends Controller
{
    public function index(){
        return view('dashboard.about-us.our-team.index');
    }
}
