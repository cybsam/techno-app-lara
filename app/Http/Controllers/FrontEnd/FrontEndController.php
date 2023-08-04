<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    public function index(){
        return view('FrontEndView.index');
    }

    public function aboutUs(){
        dd('hey, man!');
    }
    public function missionAndVission(){
        dd('hey, man!');
    }
    public function OurTeam(){
        dd('hey, man!');
    }
    public function OurConcern(){
        dd('hey, man!');
    }
    public function ourExpertise(){
        dd('hey, man!');
    }
    public function strategicPartners(){
        dd('hey, man!');
    }
}
