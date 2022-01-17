<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware("sub_admin");
    }
    public function list()
    {
        $services = Service::all();
        return view('Admin.service.index', get_defined_vars());
    }

    public function add()
    {
    	return view('Admin.service.add');
    }

    public function edit($id)
    {
    	$service = Service::find($id);
    	return view('Admin.service.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
    	$s = is_null($id) ? new Service() : Service::find($id);
    	$s->name = $req->name;

        if ($req->has('image')) {
            if(!empty($s->image))
    		    deleteFile($s->image);
    	    $s->image = uploadFile($req->image, 'services-images');
        }

    	$s->save();

    	return back()->with('success', 'Service saved successfully');
    }

    public function delete($id)
    {
    	Service::find($id)->delete();
    	return back()->with('success', 'Service deleted successfully');
    }
}
