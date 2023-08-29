<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ImageStickers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageStickersController extends Controller
{
    public function store(Request $request)
    {
        $obj = new ImageStickers();

        if ($request->hasFile('url_image')) {
            $images = $request->file('url_image');
            $imagePaths = [];
            foreach ($images as $image) {
                $galleryPath = $image->store('stickers', 'public');
                $imagePaths[] = $galleryPath;
            }
            $imageString = implode(',', $imagePaths);
            $obj->url_image = $imageString;
            $obj->created_by = Auth::user()->id;
            $obj->save();
            return response()->json($imageString);

        }
        return response()->json("Error");


    }
}
