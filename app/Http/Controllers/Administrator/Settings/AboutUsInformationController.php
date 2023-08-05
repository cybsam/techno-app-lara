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
use App\Models\AboutUsInformation;

class AboutUsInformationController extends Controller
{
    public function index(){
        $companyInfo = AboutUsInformation::where('id',1)->first();
        return view('dashboard.settings.aboutusinfo.index',[
            'companyInfo'=>$companyInfo
        ]);
    }
}
