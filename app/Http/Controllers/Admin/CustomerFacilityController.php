<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CustomerFacility;

class CustomerFacilityController extends Controller
{
    public function __construct()
    {
        $this->middleware("sub_admin");
    }
    public function list()
    {
        $facilities = CustomerFacility::all();
        return view('Admin.customer_facility.index', get_defined_vars());
    }

    public function add()
    {
    	return view('Admin.customer_facility.add');
    }

    public function edit($id)
    {
    	$facility = CustomerFacility::find($id);
    	return view('Admin.customer_facility.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
    	$cf = is_null($id) ? new CustomerFacility() : CustomerFacility::find($id);
    	$cf->name = $req->name;

        if ($req->has('image')) {
            if(!empty($cf->image))
    		    deleteFile($cf->image);
            $cf->image = uploadFile($req->image, 'customer_facility-images');
        }

    	$cf->save();

    	return back()->with('success', 'Customer Facility saved successfully');
    }

    public function delete($id)
    {
    	CustomerFacility::find($id)->delete();
    	return back()->with('success', 'Customer Facility deleted successfully');
    }
}
