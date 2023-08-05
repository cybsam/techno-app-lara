<?php

namespace App\Http\Controllers\Administrator\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Image;
use Mail;

class AboutUsInformationController extends Controller
{
    public function index(){
        return view('dashboard.settings.aboutusinfo.index');
    }
}
