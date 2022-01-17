<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Auth;
use App\UserImages;
use App\GarageDetails;
use File;

class ImageUploadController extends Controller
{
    //
    public function store(Request $request)
    {
        $garage = GarageDetails::where('user_id','=',Auth::user()->id)->first();
        $image = $request->file('file');
        $imageName = $garage->garage_name."_".$image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);

        $imageUpload = new Media();
        $imageUpload->filename = $imageName;
        $imageUpload->user_id = Auth::user()->id;
        $imageUpload->save();
        return response()->json(['success' => $imageName]);
    }

    public function delete(Request $request)
    {
        $garage = GarageDetails::where('user_id','=',Auth::user()->id)->first();
        $filename = $garage->garage_name."_".$request->get('filename');
        UserImages::where('filename', '=',$filename)->where('user_id','=',Auth::user()->id)->delete();
        $path = public_path() . '/images/' . $filename;
        if (file_exists($path)) {
            File::delete($path);
        }
        return response()->json($filename);
    }

    public function imageIntervation($imageName) {
        // open an image file
        $img = Image::make(public_path('images').'/'.$imageName);
        // resize image instance
        $img->resize(300, 300);

        /*// insert a watermark
        $img->insert('public/watermark.png');*/

        // save image in desired format
        $img->save(public_path('images').'/'.'300x300'.$imageName);
    }
}
