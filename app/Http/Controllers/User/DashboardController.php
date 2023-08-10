<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
<<<<<<< HEAD
        return view('dash-user.dashboard');
=======
        return view('user-dash.dashboard');
>>>>>>> f335813df46c9f41cc496a5b00dc6b2f2bbb9457
    }
}
