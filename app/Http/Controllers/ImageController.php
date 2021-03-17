<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request){
        $image = new Image();
        if($request->hasFile('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $image->img = $filename;
        }
        $image->save();
        return redirect()->back()->with('success', 'Logo bolo úspešne zmenené');
    }
}
