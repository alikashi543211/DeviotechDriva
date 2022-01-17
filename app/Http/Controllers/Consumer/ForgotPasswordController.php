<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ConsumerProfile;
use Mail;
use App\Rules\EmailExistRule;
use App\Rules\PasswordRule;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('consumer.consumer_forgot_password');
    }
    public function sentEmail(Request $request)
    {
        return view('consumer.consumer_sent_email',get_defined_vars());
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
        Mail::send('consumer.emails.reset_password',['email' => $email], function ($send) use($email){
            $send->to($email)->subject('Reset Password Email');
            });
           
        return redirect()->route("consumer.sent_email",['email'=>$request->email])->with("success","Email sent successfully");
    }

    public function resetPassword(Request $request)
    {
        return view('consumer.consumer_reset_password',get_defined_vars());
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
    //    dd($user);
         $this->validate($request,$rules,$messages);
        $password=$request->password;
         Mail::send('consumer.emails.password_changed',['user' => $user,'password'=>$password], function ($send) use($user){
            $send->to($user['email'])->subject('Password Changed');
            });
    	return redirect()->route('consumer.reset_password_success')->with('success', 'Your password has been changed successfully ');
    }

    public function resendResetEmail(Request $request)
    {
        $email=$request->email;
        Mail::send('consumer.emails.reset_password',['email' => $email], function ($send) use($email){
            $send->to($email)->subject('Reset Password Email');
            });
           
        return redirect()->back()->with("success","Email sent successfully");
    }
    public function resetSuccess()
    {
        return view('consumer.consumer_reset_success');
    }
    

}
