<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUpdateRequest;

class ImageController extends Controller
{
    public static function store(StoreUpdateRequest $request){
        //dd($request);
        if($request->hasFile('image')){
        $image = new Image;
        $extension = $request->image->extension();
        $path = Storage::put('images',$request->image);
        $image->path = $path;
        $image->save();
        }else{
        }
        return $image->id;
    }
    public static function destroy(Image $image){
        Storage::delete($image->path);
        $destroy = Image::destroy($image->id);
    }
}
