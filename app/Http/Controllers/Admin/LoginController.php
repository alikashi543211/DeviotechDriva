<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Mail;
use Session;

class LoginController extends Controller
{
    //

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::AdminDashboard;
    protected function authenticated(Request $request, $user)
    {
        if(auth()->user()->two_factor_login==1){
            $otp=str_random(4);
            $user=auth()->user();
            Session::put("otp",$otp);
            Session::put("two_factor_auth",false);
            $user->save();
            Mail::send('emails.admin.login_otp',['user' => $user,'otp'=>$otp], function ($send) use($user){
                $send->to($user['email'])->subject('Verify Login');
            });
        }else{
            Session::put("two_factor_auth",true);
        }
        sendOtp();
        return redirect()->route("admin.dashboard");
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

    public function showLoginForm()
    {
        return view('Admin.admin_login');
    }

    public function logout(Request $request)
    {
        session('g_token', '');
        $this->performLogout($request);
        $request->session()->invalidate();
        return redirect()->route('login');
    }
}
