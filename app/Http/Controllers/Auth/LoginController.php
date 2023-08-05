<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo(){
        if(Auth()->user()->role_int == '1'){
            if(Auth()->user()->is_active == '1'){
                return route('Administrator.index');
            }else {
                return redirect()->route('login')->with('logfaild','User Suspended by admin, contact admin to release!');
            }
            
        }else if(Auth()->user()->role_int = '0'){
            if(Auth()->user()->is_active == '1'){
                return route('basicUser.dashboard');
            }else {
                return redirect()->route('login')->with('logfaild','User Suspended by admin, contact admin to release!');
            }
            
        }else{
            return route('frontEndIndex');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    

    public function login(Request $request){
        $input = $request->all();
        
        $this->validate($request, [
            //'username' => 'required|username',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // 'username'=>$input['username'],
        if(Auth()->attempt(array('email'=>$input['email'],'password'=>$input['password']))){
            if(Auth()->user()->role_int == 1){
                if (Auth()->user()->is_active == '1') {
                    if (Auth()->user()->role == 'admin') {
                        return redirect()->route('Administrator.index');
                    }else {
                        return redirect()->route('login')->with('logfaild','User Suspended by admin, contact admin to release!');
                    }
                }else{
                    return redirect()->route('login')->with('logfaild','User Suspended by admin, contact admin to release!');
                }
            }elseif (Auth()->user()->role_int == 0) {
                if (Auth()->user()->is_active == '1') {
                    if (Auth()->user()->role == 'user') {
                        return redirect()->route('basicUser.dashboard');
                    }else {
                        return redirect()->route('login')->with('logfaild','User Suspended by admin, contact admin to release!');
                    }
                }else {
                    return redirect()->route('login')->with('logfaild','User Suspended by admin, contact admin to release!');
                }
            }else {
                return redirect()->route('login')->with('logfaild','Wrong Credentials, try again, or contact admin.');
            }
        }else {
            return redirect()->route('login')->with('logfaild','Wrong Credentials, try again, or contact admin...');
        }

        
    }
}
