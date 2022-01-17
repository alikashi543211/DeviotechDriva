<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\FirstNameRule;
use App\Rules\LastNameRule;
use App\Rules\ContactNumberRule;
use App\Rules\PasswordRule;
use App\Rules\PasswordExistRule;
use Hash;
use Mail;
use App\User;
use Session;
use Carbon\Carbon;
use App\GarageProfile;
use App\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        // $this->middleware("sub_admin");
    }
    public function save(Request $req)
    {
        foreach ($req->except('_token') as $name => $value) {
            $setting = Setting::where('name',$name)->first() ?? new Setting();
            if ($req->hasFile($name)) {
                $image_path =  uploadFile($req->$name, 'uploads/cms', 'image');
                $setting->name = $name;
                $setting->value = $image_path;
                $setting->save();
            } else{
                $setting->name = $name;
                $setting->value = $value;
                $setting->save();
            }
        }
        $msg = 'Settings Updated Successfully';
        return redirect()->back()->with('message', $msg);
    }

    public function settings(Request $request)
    {
        if(isset($request->search)){
            $search=$request->search;
            $users=User::where('name','like','%'.$search.'%')->where('parent_id',auth()->user()->id)->where("role","sub_admin")->get();
        }else{
        $users=auth()->user()->sub_admins;
        }
        return view('Admin.settings.settings',get_defined_vars());
    }
    public function updateProfile(Request $req)
    {
        $messages = [
            'first_name.required' => 'Enter your first name',
            'last_name.required' => 'Enter your last name',
            'picture.image' => 'Upload a valid profile image',
            'email.email' => 'Enter a valid email address',
            'phone_no.required' => 'Enter your contact number',
        ];
        $rules = [
            'first_name' => ['required','string','max:95',new FirstNameRule()],
            'last_name' => ['required','string','max:95',new LastNameRule()],
            'picture' => 'image|mimes:jpeg,png,jpg|max:1000',
            'email'=>'required|email'.(!authCheck() ? '|unique:users' : ''),
            'phone_no' => ['required',new ContactNumberRule()],
        ];

        $this->validate($req,$rules,$messages);
    	$user = auth()->user();
    	$user->name = $req->first_name. ' ' . $req->last_name;
        $user->email = $req->email;
        $user->phone_no=$req->phone_no;
        if($req->has('picture')) {
            $user->picture = uploadFile($req->picture, 'admin_profile-pictures/'.str_slug($user->name));
        }
    	$user->save();
       return back()->with("success","You have updated your contact details");
    }

    public function updatePassword(Request $req)
    {
        $messages = [
            'old_password.required' => 'Enter your old password',
            'password.required' => 'Enter your password',
            'password.confirmed' => 'Confirm your password',
            'password.min' => 'Enter a stronger password',
        ];
        $rules = [
            'old_password' => ['required',new PasswordExistRule()],
            'password' => ['required','min:6','confirmed'],
        ];
        $this->validate($req,$rules,$messages);
        $user=auth()->user();
        $user->password=Hash::make($req->password);
        $user->save();
        return redirect()->back()->with('success', 'You have updated your password');
    }

    public function inviteUser(Request $req)
    {
        $user_count=User::where("email",$req->email)->count();
        if($user_count==0)
        {
            $user=new User();
            $user->name=$req->first_name. ' ' . $req->last_name;
            $user->email=$req->email;
            $user->role="sub_admin";
            $user->parent_id=auth()->user()->id;
            $user->save();
        }else
        {
            return response()->json(['msg'=>'Email already exist..']);
        }
        $email=$req->email;
        $name=$req->first_name. ' ' . $req->last_name;
        $user=['email'=>$email,'name'=>$name,'invited_by'=>base64_encode(auth()->user()->id)];
        Mail::send('admin.emails.user_invitation',['user' => $user], function ($send) use($user){
            $send->to($user['email'])->subject('Admin Invitation');
            });
        return response()->json(['msg'=>'You have sent your invitation']);
    }

    public function inviteLink(Request $req)
    {
        $user=User::where("email",base64_decode($req->user))->first();
        $pass=str_random(8);
        $user->password=bcrypt($pass);
        $user->email_status="verified";
        $user->save();
        $user_data=['email'=>$user->email,'password'=>$pass];
        Mail::send('admin.emails.account_password',['user' => $user_data], function ($send) use($user_data){
            $send->to($user_data['email'])->subject('Account Password');
            });
        return redirect()->route('admin.login');
    }

    public function removeUser(Request $req)
    {
        User::find($req->id)->delete();
        return back()->with("success","You have removed user");
    }

    public function twoFactorLogin(Request $req)
    {
        if($req->status==1)
        {
            $user=auth()->user();
            $user->two_factor_login=1;
            $user->save();
            $msg="Two factor login authentication has been On successfully";
        }else if($req->status==0)
        {
            $user=auth()->user();
            $user->two_factor_login=0;
            $user->save();
            $msg="Two factor login authentication has been Off successfully";
        }
        return response()->json(["msg"=>$msg]);
    }

}
