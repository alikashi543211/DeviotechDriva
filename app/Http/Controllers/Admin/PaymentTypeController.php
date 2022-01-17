<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymentType;

class PaymentTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware("sub_admin");
    }
    public function list()
    {
        $payment_types = PaymentType::all();
        return view('Admin.payment_type.index', get_defined_vars());
    }

    public function add()
    {
    	return view('Admin.payment_type.add');
    }

    public function edit($id)
    {
    	$payment_type = PaymentType::find($id);
    	return view('Admin.payment_type.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
    	$p = is_null($id) ? new PaymentType() : PaymentType::find($id);
    	$p->name = $req->name;

        if ($req->has('image')) {
            if(!empty($p->image))
    		    deleteFile($p->image);
            $p->image = uploadFile($req->image, 'payment_type-images');
        }

    	$p->save();

    	return back()->with('success', 'Payment Type saved successfully');
    }

    public function delete($id)
    {
    	PaymentType::find($id)->delete();
    	return back()->with('success', 'Payment Type deleted successfully');
    }
}
