<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\consumerProfile;
use Mail;
use App\Rules\EmailExistRule;
use App\Rules\PasswordRule;
use Session;
class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('login.forgot_password');
    }

    public function sentEmail(Request $request)
    {
        $email=Session::get("driva_user_email");
        return view('login.sent_email',get_defined_vars());
    }

    public function sendResetLink(Request $request)
    {
        $messages = [
            'email.required' => 'Enter your email address',
            'email.email' => 'Enter a valid email address',

        ];
        $rules = [
            'email' => ['required','email',new EmailExistRule($request->email)],

        ];
        $email=$request->email;
        $this->validate($request,$rules,$messages);
        Mail::send('emails.reset_password',['email' => $email], function ($send) use($email){
            $send->to($email)->subject('Reset your password');
            });
        Session::put("driva_user_email",$request->email);
        return redirect()->route("login.sent_email")->with("success","Email sent successfully");
    }

    public function resetPassword(Request $request,$email)
    {
        Session::forget("driva_user_email");
        return view('login.reset_password',get_defined_vars());
    }
    public function saveResetPassword(Request $request)
    {
        $messages = [
            'password.required' => 'Enter your password',
            'password.confirmed' => 'Confirm your password',
            'password.min' => 'Enter a stronger password',
        ];
        $rules = [
            'password' => ['required','min:6','confirmed',new PasswordRule()],
        ];
        $user=User::where('email',$request->email)->first();
        $user->password=bcrypt($request->password);
        $user->save();
        //      dd($user);resetPassword
        $this->validate($request,$rules,$messages);
        $password=$request->password;
        Mail::send('emails.password_changed',['user' => $user,'password'=>$password], function ($send) use($user){
        $send->to($user['email'])->subject('Password update');
        });
        return redirect()->route('login.reset_password_success')->with('success', 'Your password has been changed successfully ');
    }

    public function resendResetEmail(Request $request)
    {
        $email=Session::get("driva_user_email");
        Mail::send('emails.reset_password',['email' => $email], function ($send) use($email){
            $send->to($email)->subject('Reset your password');
            });
        Session::flash("resend_success","We have resent a reset link to ".$email." Please click on the link in your email to reset your account.");
        return redirect()->back()->with("success","Email sent successfully");
    }

    public function resetSuccess()
    {
        return view('login.reset_success');
    }

    public function verifyEmail($email='')
    {
        $user=User::where('email',base64_decode($email))->first();
        $user->email_status="verified";
        $date=date("Y-m-d");
        $user->email_verified_at=$date;
        $user->save();
        if($user->role=='consumer'){
            return redirect()->route('consumer.dashboard')->with('success', 'Email has been verified successfully');
        }else if($user->role=='garage'){
            Auth::login($user);
            return redirect()->route('garage.dashboard')->with('success', 'Email has been verified successfully');
        }
    }
}
