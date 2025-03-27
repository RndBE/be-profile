<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('public/uploads', $filename);

            // URL akses gambar
            $url = asset('storage/uploads/' . $filename);

            return response()->json([
                'fileName' => $filename,
                'uploaded' => 1,
                'url' => $url
            ]);
        }
    }

}
