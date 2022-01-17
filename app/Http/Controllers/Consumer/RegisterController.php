<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ConsumerProfile;
use Auth;
use Session;
use App\Rules\FirstNameRule;
use App\Rules\LastNameRule;
use App\Rules\PasswordRule;
use Mail;
use App\GarageProfile;
use App\Notifications\RegisterUser;

class RegisterController extends Controller
{
    public function registerConsumer()
    {
        return view('consumer.consumer_register');
    }

    public function saveConsumer(Request $request)
    {
        // dd($request->display_name);
        $messages = [
            'first_name.required' => 'Enter your first name',
            'last_name.required' => 'Enter your last name',
            'email.required' => 'Enter your email address',
            'email.email' => 'Enter a valid email address',
            'password.required' => 'Enter your password',
            'password.confirmed' => 'Confirm your password',
            'password.min' => 'Enter a stronger password',
            'g-recaptcha-response.required' => 'Verify Google Recaptcha',
            'g-recaptcha-response.captcha' => 'Verify Google Recaptcha'

        ];
        $rules = [
            'first_name' => ['required','string','max:95',new FirstNameRule()],
            'last_name' => ['required','string','max:95',new LastNameRule()],
            'email'=>'required|email'.(!authCheck() ? '|unique:users' : ''),
            'password' => ['required','min:6','confirmed',new PasswordRule()],
            'g-recaptcha-response' => 'required|captcha'
        ];

        $this->validate($request,$rules,$messages);
        $user = new User();
        $user->name = $request->first_name. ' ' . $request->last_name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->role = 'consumer';
        $user->save();
        $consumer = $user->consumer_profile ?: new ConsumerProfile();
    	$consumer->user_id = $user->id;
    	$consumer->display_name = $request->display_name;
        $consumer->save();

        Mail::send('emails.consumer.verification',['user' => $user, 'consumer' => $consumer], function ($send) use($user){
            $send->to($user['email'])->subject('Verify your email address');
        });

        Auth::login($user);
        $details = [
            'msg' => 'You have been registered successfully',
        ];
        $user->notify(new RegisterUser($details));
        if(isset($request->b))
        {
            $slug = GarageProfile::find($request->b)->slug;
            return redirect()->route("front.garage_detail", $slug);
        }
    	return redirect()->route('consumer.not_verified.dashboard')->with('success', 'Your account has been successfully registered');
    }

    public function verifyEmail($email='')
    {
        Session::flush();
        $user=User::where('email',base64_decode($email))->first();
        $user->email_status="verified";
        $date=date("Y-m-d H:i:s");
        $user->email_verified_at=$date;
        $user->save();
        return redirect()->route('login.login',['e'=>$email])->with('success', 'Email has been verified successfully');
    }

    public function resendVerifyEmail(Request $request)
    {
        $email=$request->email;
        $user=User::where("email",$email)->first();
        $garage=$user->garage_profile;
        Mail::send('emails.consumer.resend_verification',['user' => $user, 'garage' => $garage], function ($send) use($user){
            $send->to($user['email'])->subject('Verify your email address');
            });

        return redirect()->back()->with("success","Verification link has been sent to your email");
    }
    public function sentVerifyEmail(Request $request)
    {
        return view('consumer.consumer_sent_verify_email',get_defined_vars());
    }

}
