<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BerandaCarousel;
use Illuminate\Support\Facades\Storage;

class AdminCarouselController extends Controller
{
    public function index()
    {
        $data = [
            'carousels' => BerandaCarousel::orderBy('created_at', 'desc')->get(), // paginate the results
        ];
        return view('Admin.carousel.index', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'sub_judul' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
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

        toast('Berhasil menambahkan data!','success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string',
            'sub_judul' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $carousel = BerandaCarousel::findOrFail($id);

        $carousel->judul = $request->judul;
        $carousel->sub_judul = $request->sub_judul;

        if ($request->hasFile('gambar')) {
            if ($carousel->gambar && Storage::exists('public/' . $carousel->gambar)) {
                Storage::delete('public/' . $carousel->gambar);
            }
            $fileName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $filePath = $request->file('gambar')->storeAs('public/carousel', $fileName);
            $carousel->gambar = 'carousel/' . $fileName;
        }

        $carousel->save();
        toast('Berhasil mengubah data!','success');
        return redirect()->back();
    }


    public function destroy($id)
    {
        $carousel = BerandaCarousel::findOrFail($id);

        if ($carousel->gambar && Storage::exists('public/' . $carousel->gambar)) {
            Storage::delete('public/' . $carousel->gambar);
        }

        $carousel->delete();

        toast('Berhasil menghapus data!','success');
        return redirect()->back();
    }

}
