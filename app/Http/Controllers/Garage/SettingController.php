<?php

namespace App\Http\Controllers\Garage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\ContactNumberRule;
use App\Rules\FirstNameRule;
use App\Rules\LastNameRule;
use App\Rules\ContactTwoRule;
use App\Rules\PasswordRule;
use App\Rules\PasswordExistRule;
use Hash;
use App\User;
use App\Notifications\AccountUpdate;
use Mail;
use App\GarageProfile;
use Session;

class SettingController extends Controller
{
    public function __construct()
    {
        // $this->middleware("sub_garage")->except('inviteLink');
    }
    public function update_profile(Request $req)
    {
        $messages = [
            'first_name.required' => 'Enter your first name',
            'last_name.required' => 'Enter your last name',
            'picture.image' => 'Upload a valid profile image',
            'email.required' => 'Enter your email address',
            'contact_1.required' => 'Enter your contact number',
            'email.email' => 'Enter a valid email address',
        ];
        $rules = [
            'first_name' => ['required','string','max:95',new FirstNameRule()],
            'last_name' => ['required','string','max:95',new LastNameRule()],
            'picture' => 'image|mimes:jpeg,png,jpg|max:1000',
            'email'=>'required|email'.(!authCheck() ? '|unique:users' : ''),
            'contact_1' => [(auth()->user()->role=="garage" ? 'required' : ''),new ContactNumberRule()],
            'contact_2' => [new ContactTwoRule()],
        ];

        $this->validate($req,$rules,$messages);
    	$user = auth()->user();
    	$user->name = $req->first_name. ' ' . $req->last_name;
    	$user->email = $req->email;
        $user->save();
        $profile=$user->garage_profile;
        if($user->role=="garage")
        {
            $profile->contact_1=$req->contact_1;
            $profile->contact_2=$req->contact_2 ? : null;
            if(isset($req->available_status)){
                $profile->available_status = "available";
            }else{
                $profile->available_status = "away";
            }
        }
    	if ($req->has('picture')) {
            $profile->picture = uploadFile($req->picture, 'garage_profile-pictures/'.str_slug($user->name));
        }
        $profile->save();
        $garage=auth()->user();
        $details = [
            'msg' => 'Your account details have been updated'
        ];
        $garage->notify(new AccountUpdate($details));
        return redirect()->back()->with('success', 'Your profile details have been updated');
    }
    public function account_profile()
    {
        return view('garage.settings.account_profile');
    }
    public function authentication()
    {
        return view('garage.settings.authentication');
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
            'password' => ['required','min:6','confirmed',new PasswordRule()],
        ];
        $this->validate($req,$rules,$messages);
        $user=auth()->user();
        $user->password=Hash::make($req->password);
        $user->save();
        $garage=auth()->user();
        $details = [
            'msg' => 'Your account details have been updated'
        ];
        $garage->notify(new AccountUpdate($details));
        return redirect()->back()->with('success', 'You have updated your password');
    }

    public function manageMembers(Request $req)
    {
        if(isset($req->search)){
            $search=$req->search;
            $users=User::where('name','like','%'.$search.'%')->where('parent_id',auth()->user()->id)->where("role","sub_garage")->get();
        }else{
        $users=auth()->user()->sub_garages;
        }
        return view('garage.settings.members',get_defined_vars());
    }

    public function inviteUser(Request $req)
    {
        $user_count=User::where("email",$req->email)->count();
        if($user_count==0)
        {
            $user=new User();
            $user->name=$req->first_name. ' ' . $req->last_name;
            $user->email=$req->email;
            $user->role="sub_garage";
            $user->parent_id=auth()->user()->id;
            $user->save();
        }else
        {
            return response()->json(['msg'=>'Email already exist..']);
        }
        $email=$req->email;
        $name=$req->first_name. ' ' . $req->last_name;
        $user=['email'=>$email,'name'=>$name,'invited_by'=>base64_encode(auth()->user()->id)];

        Mail::send('garage.emails.user_invitation',['user' => $user], function ($send) use($user){
            $send->to($user['email'])->subject('Garage Invitation');
            });
        return response()->json(['msg'=>'You have sent your invitation']);
    }

    public function inviteLink(Request $req)
    {
        $user=User::where("email",base64_decode($req->user))->first();
        $pass=str_random(8);
        $user->password=bcrypt($pass);
        $user->email_status="verified";
        $date=date("Y-m-d H:i:s");
        $user->email_verified_at=$date;
        $user->save();
        $garage=new GarageProfile();
        $garage->user_id=$user->id;
        $garage->save();
        $user_data=['email'=>$user->email,'password'=>$pass];
        Mail::send('garage.emails.account_password',['user' => $user_data], function ($send) use($user_data){
            $send->to($user_data['email'])->subject('Account Password');
            });
        return redirect()->route('login.login');
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

    public function deleteProfile(Request $req)
    {

        $garage=GarageProfile::find(garage()->id);
        $garage->garage_services()->delete();
        $garage->saved_garages()->delete();
        $garage->garage_customer_facilities()->delete();
        $garage->garage_keywords()->delete();
        $garage->garage_payment_types()->delete();
        $garage->garage_images()->delete();
        $garage->working_hours()->delete();
        $garage->garage_bookings()->delete();
        $garage->booking_services()->delete();
        $garage->garage_views()->delete();
        $garage->discounts()->delete();
        $garage->garage_advertisings()->delete();
        $garage->reviews()->delete();
        $garage->delete();

        // Profile Delete..
        if($req->type=='1')
        {
            // Profile Delete
            GarageProfile::create(['user_id'=>auth()->user()->id]); 
            $msg="Your proflie deleted successfully";

        }elseif($req->type=='2')
        {
            // Account Delete
            User::find(auth()->user()->id)->delete();
            $msg="Your account deleted successfully";

            Session::flush();
            return redirect()->route('garage.register')->with("message",$msg);
        }
        
        return redirect()->route('garage.application.redirection')->with("success",$msg);
    }

    public function remove_account(Request $req)
    {
        return view('garage.settings.remove_account',get_defined_vars());
    }
}
