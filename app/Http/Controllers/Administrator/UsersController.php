<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\VerifyUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Image;
use Mail;
use App\Models\DeleteUserListAd;



class UsersController extends Controller
{
    public function index(){
        $listAllUsers = User::all()->reverse();
        $users = User::where('role_int',0)->where('role','user')->get()->reverse();
        $Admin = User::where('role_int',1)->where('role','admin')->get()->reverse();

        return view('dashboard.users.index',[
            'users'=>$users,
            'Admin'=>$Admin,
            'listAllUsers'=>$listAllUsers
        ]);
    }


    //new user add from dashboard
    public function addNewUser(Request $request){
        
        $request->validate([
            'name'=>['required','string','min:5','max:50'],
            'username'=>['required','unique:users','min:5','max:50'],
            'email'=>['required','email','unique:users','string'],
            'password'=>['required','string','confirmed','min:6'],
        ]);

        $input = $request->all();
        $adminName = 'by-'.Auth::user()->username;
        $adminId = Auth::user()->id;

        $user_name = Str::slug($input['name']);
        $defaultImageLocation = base_path('public/image/defaultimage/userimage.png');
        $randStr = Carbon::now()->format('Y-m-d-H-i-s-u');
                
        $newImageFromDefault = $user_name.'-'.$randStr.'.png';

        $user = new User();
        $user->name = $input['name'];
        $user->username = Str::lower($input['username']);
        $user->email = $input['email'];
        $user->user_image = $newImageFromDefault;
        $user->password = Hash::make($input['password']);
        $user->role = 'user';
        $user->role_int = '0';
        $user->source = $adminName;
        $user->admin_id = $adminId;
        $saveInfo = $user->save();
        $lastId = $user->id;

        $token = $lastId.hash('sha256',\Str::random(120));
        $verifyUrl = route('user.verify',['token'=>$token,'service'=>'Email Verification','from'=>'techno','sender'=>'cybsam','lang'=>'english']);

        VerifyUser::create([
            'user_id'=>$lastId,
            'user_email'=>$input['email'],
            'token'=>$token
        ]);

        $formEmail = 'no-replay-tech@technoapogee.com';
        $formName = 'Techno Apogee Limited Authentication';
        $message = "Dear <b> ".$request->name."</b>.</br>";
        $message.= 'Thanks for signin up, we just need you to verify your email address to complete setting up your account.';
        $mail_data = [
            'recipient'=>$input['email'],
            'fromName'=>$formName,
            'fromEmail'=>$formEmail,
            'subject'=>"Authentication From Techno Apogee Engineering Limited",
            'body'=>$message,
            'actionLink'=>$verifyUrl,
        ];

        \Mail::send('mail.email-register-user', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromEmail'])
                    ->subject($mail_data['subject']);
            });

        $uploadLocation = base_path('public/image/users/'.$newImageFromDefault);
        // File::copy($defaultImageLocation)
        Image::make($defaultImageLocation)->save($uploadLocation);

        if($saveInfo){
            return redirect()->back()->with('regSuccAdmin','You need to verify user account, we have sent you an activition link, please check your email.');
        }else{
            return redirect()->back()->with('regErroradmin', 'Something went wrong, please try again!');
        }
    }

    public function softDeleteUser(Request $request){
        dd($request->all());
        $userId = $request->dlt_id;
        echo $userId;
    }

    // public function create(){

    // }
}
