<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ConsumerProfile;
use Auth;
use Mail;

class NotVerifiedController extends Controller
{
    public function __construct()
    {
        $this->middleware("consumer.email.not_verified")->except("saveProfilePic","coverProfile");
    }
    public function dashboard()
    {
        return view('consumer.not_verified.dashboard');
    }
    public function updateDisplayName(Request $request)
    {
        if(count_spaces($request->display_name)>0 || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',
    $request->display_name) || strlen($request->display_name)<=4) { $message=array( 'result'=> 'error',
        'msg' => 'Please change your display name and try again',
        'display_name' => $request->display_name,
        );
        return response()->json($message);
        }
        $display_name_count=ConsumerProfile::where("user_id","!=",auth()->user()->id)->where('display_name',$request->display_name)->count();
        if($display_name_count>0)
        {
        $message=array( 'result'=> 'error',
        'msg' => 'Your chosen display name is not available. Please try another',
        'display_name' => $request->display_name,
        );
        return response()->json($message);
        }
        $profile=ConsumerProfile::find(consumer()->id);
        $profile->display_name=$request->display_name;
        $profile->save();

        $message = array(
        'result' => 'success',
        'msg' => 'You have successfully changed your display name',
        'display_name' => $request->display_name,
        );
        return response()->json($message);
        }
        public function resendVerifyEmail(Request $req)
        {
        $consumer=consumer();
        $user=Auth::user();
        $user->email=$req->email;
        $user->save();
        Mail::send('emails.consumer.resend_verification',['user' => $user, 'consumer' => $consumer], function
        ($send)
        use($user){
        $send->to($user['email'])->subject('Verify your email address');
        });
        return back()->with("success","Verification email sent successfully");
        // $message = array(
        // 'success' => 'Verification email sent successfully',
        // );
        // return response()->json($message);
        }
        public function saveProfilePic(Request $req)
        {
        $user=Auth::user();
        $profile=consumer();
        if ($req->has('picture')) {
        $profile->picture = uploadFile($req->picture, 'consumer_profile-pictures/'.str_slug($user->name));
        }

        $profile->save();
        $message = array(
        'success' => 'Profile picture updated successfully',
        );
        return response()->json($message);

        }

        public function coverProfile(Request $req)
        {
        return view("consumer.ajax.profile_cover",get_defined_vars());
        }


        }
