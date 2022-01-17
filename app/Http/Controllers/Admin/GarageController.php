<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GarageProfile;
use App\User;
use Carbon\Carbon;
use Mail;
use Session;

class GarageController extends Controller
{

    public function applications()
    {
        $garages = GarageProfile::where('status', '=', 'submitted')->get();
        return view('Admin.garages.application', get_defined_vars());
    }

    public function exports()
    {
        $garages = GarageProfile::where('status', '=', 'approved')->get();
        return view('Admin.garages.exports', get_defined_vars());
    }

    public function detail($id)
    {
        $garage = GarageProfile::find($id);
        return view('Admin.garages.profile', get_defined_vars());
    }

    public function delete($id)
    {
        $garage = GarageProfile::find($id);
        GarageProfile::create(['user_id'=>$garage->user_id]);
        $garage->delete();
        return response()->json(['success' => 'Garage Profile Deleted Successfully']);
    }

    public function approve($id)
    {
        $code = genVerifCode();
        $garage = GarageProfile::find($id);
        Mail::send('emails.verification_code', ['garage'=>$garage, 'code'=>$code], function ($message) use($garage) {
            $message->to($garage->user->email, $garage->name);
            $message->subject('Verification Code');
        });

        $garage->verification_code = $code;
        $garage->status = "approved";
        $garage->save();
        $user=$garage->user;
        Mail::send('emails.garage.app_accepted',['user' => $user], function ($send) use($user){
            $send->to($user['email'])->subject('Congrats! Your account has been approved');
            });
        Mail::send('emails.garage.verification_code',['user' => $user], function ($send) use($user){
            $send->to($user['email'])->subject('Verification Code');
            });
        session()->flash('success', 'Garage Approved and Verification Code Sent!');
        return response()->json();
    }

    public function revision(Request $req)
    {
        // dd($req->message_body);
        $garage = GarageProfile::find($req->id);
        $user = $garage->user;

        Mail::send('emails.garage.app_revision',get_defined_vars(), function ($send) use($user){
            $send->to($user['email'])->subject('Your garage account application');
        });

        $garage->status = "in_revision";
        $garage->save();

        return redirect()->back()->with('success', 'Garage ProfileRevision Email sent to User!');
    }

    public function decline($id)
    {
        $garage = GarageProfile::find($id);
        $garage->status = "in_revision";
        $garage->save();
        $user=$garage->user;
        Mail::send('emails.garage.app_declined',['user' => $user], function ($send) use($user){
            $send->to($user['email'])->subject('Application declined');
        });
        return response()->json(['success' => 'Garage Profile Deleted Successfully']);
    }

    public function generateCode($id)
    {
        $code = genVerifCode();
        $garage = GarageProfile::find($id);
        Mail::send('emails.verification_code', ['garage'=>$garage, 'code'=>$code], function ($message) use($garage) {
            $message->to($garage->user->email, $garage->name);
            $message->subject('Verification Code');
        });
        $garage->verification_code = $code;
        $garage->save();

        return redirect()->back()->with('success','New Code Generated and emailed to garage owner!');
    }

    public function overView()
    {
        $garage_profiles=GarageProfile::all();
        return view('Admin.garages.overview',get_defined_vars());
    }

    public function overViewProfile($id)
    {
        $garage=GarageProfile::find($id);
        return view('Admin.garages.profile',get_defined_vars());
    }

    public function suspend(Request $request)
    {
        $garage=GarageProfile::find($request->id);
        $garage->status="suspended";
        $garage->save();
        return back()->with('success','Suspended successfully');
    }

    public function deleteOverview(Request $request)
    {
        $garage=GarageProfile::find($request->id);
        User::find($garage->user->id)->delete();
        $garage->delete();
        return back()->with('success','Deleted successfully');
    }

}
