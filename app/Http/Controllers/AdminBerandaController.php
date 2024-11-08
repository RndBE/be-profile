<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BerandaCarousel;

class AdminBerandaController extends Controller
{
    public function index()
    {
        $data = [
            'carousels' => BerandaCarousel::orderBy('created_at', 'desc')->paginate(10), // paginate the results
        ];
        return view('admin.beranda-carousel.index', $data);
    }


    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'judul' => 'required|string|max:255',
            'sub_judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imageName = null;
        if ($request->hasFile('gambar')) {
            $fileName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $filePath = $request->file('gambar')->storeAs('public/carousel', $fileName);
            $imageName = 'carousel/' . $fileName;
        }

        BerandaCarousel::create([
            'judul' => $request->judul,
            'sub_judul' => $request->sub_judul,
            'gambar' => $imageName,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data!');
    }

}
