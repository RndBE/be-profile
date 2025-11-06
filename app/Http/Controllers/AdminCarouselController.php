<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BerandaCarousel;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $imageName = null;
        if ($request->hasFile('gambar')) {
            $originalName = $request->file('gambar')->getClientOriginalName();
            $fileName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.webp';
            $imageName = 'carousel/' . $fileName;
            $storagePath = storage_path('app/public/' . $imageName);

            // Pastikan direktori tujuan ada
            if (!file_exists(dirname($storagePath))) {
                mkdir(dirname($storagePath), 0755, true);
            }

            // Baca file asli dan simpan sebagai webp
            $imageFromRequest = $request->file('gambar')->getRealPath();

            Image::read($imageFromRequest)  // Gunakan Intervention Image
                ->toWebp()
                ->save($storagePath);
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $carousel = BerandaCarousel::findOrFail($id);

        $carousel->judul = $request->judul;
        $carousel->sub_judul = $request->sub_judul;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($carousel->gambar && Storage::exists('public/' . $carousel->gambar)) {
                Storage::delete('public/' . $carousel->gambar);
            }

            // Generate nama baru
            $originalName = $request->file('gambar')->getClientOriginalName();
            $fileName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.webp';
            $imagePath = 'carousel/' . $fileName;
            $storagePath = storage_path('app/public/' . $imagePath);

            // Pastikan folder ada
            if (!file_exists(dirname($storagePath))) {
                mkdir(dirname($storagePath), 0755, true);
            }

            // Konversi dan simpan gambar
            $imageFromRequest = $request->file('gambar')->getRealPath();

            Image::read($imageFromRequest)
                ->toWebp()
                ->save($storagePath);

            $carousel->gambar = $imagePath;
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
