<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->upload->extension();
        $request->upload->move(public_path('images'), $imageName);

        return response()->json([
            'uploaded' => 1,
            'fileName' => $imageName,
            'url' => '/images/' . $imageName,
        ]);
    }
}
