<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOtpRule;
use Session;

class OtpController extends Controller
{
    public function verifyLogin()
    {
        return view("login.verify_login");
    }

    public function resendVerifyLogin(Request $req)
    {
        sendOtp();
        Session::flash("resend_success","We have resent login verification otp to ".auth()->user()->email.". Please check and verify your account.");
        return back();
    }

    public function matchOtp(Request $req)
    {
        $messages = [
            'two_factor_code.required' => 'Enter your OTP',
        ];
        $rules = [
            'two_factor_code' => ['required',new MatchOtpRule()],
        ];
        $this->validate($req,$rules,$messages);
        Session::put("two_factor_auth",true);
        $user=auth()->user();
        if($user->role=="admin" || $user->role=="sub_admin")
        {
            return redirect()->route("admin.dashboard")->with("success","You have verified successfully");
        }else if($user->role=="garage" || $user->role=="sub_garage")
        {
            return redirect()->route("garage.dashboard")->with("success","You have verified successfully");
        }else if($user->role=="consumer")
        {
            return redirect()->route("consumer.dashboard")->with("success","You have verified successfully");
        }
    }
}
