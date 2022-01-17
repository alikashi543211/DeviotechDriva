<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Visitor;
use Carbon\Carbon;
use App\GarageProfile;

class LoginController extends Controller
{
    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    	// protected $redirectTo = RouteServiceProvider::ConsumerDashboard;

    	// protected $redirectTo = RouteServiceProvider::GarageDashboard;
    protected function authenticated(Request $request, $user)
    {
       if(auth()->user()->role=='garage'){
           if(auth()->user()->email_status=="verified")
           {
            websiteVisitor($request);
            sendOtp();
            return redirect()->route('garage.dashboard');
           }else{
               $email=base64_encode(auth()->user()->email);
               Session::flush();
               return redirect()->route('garage.send_verify_email',$email);
           }
          }else if(auth()->user()->role=='consumer')
          {
            websiteVisitor($request);
            sendOtp();
            if(isset($request->b))
            {
                $garage=GarageProfile::find($request->b);
                return redirect()->route('consumer.garages.book_garage',$garage->id)->with("success", "Start your booking now!");  
                
            }elseif(isset($request->r))
            {
                $garage=GarageProfile::find($request->r);
                if(save_garage($request->r))
                {
                  return redirect()->route('front.garage_detail',$garage->slug)->with('success','Profile added to your saved list');  
                }else
                {
                    return redirect()->route('front.garage_detail',$garage->slug)->with('error','Profile already exist in your saved list');
                }
            }
            if (auth()->user()->email_status == "not_verified") 
            {
                return redirect()->route('consumer.not_verified.dashboard');
            }else 
            {
                return redirect()->route('consumer.dashboard');
            }
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

    public function showLoginForm(Request $req)
    {
        return view('login.login',get_defined_vars());
    }

protected function validateLogin(Request $request)
    {
        $messages = [
            'email.required' => 'Enter your email address',
            'password.required' => 'Enter your password',
        ];
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

         $this->validate($request,$rules,$messages);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        Session::flash("login_failed","Your login credentials do not match our records. Try again");
        Session::flash("email",$request->email);
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        session('g_token', '');
        $this->performLogout($request);
        $request->session()->invalidate();
        return redirect()->route('login.login');
    }


}
