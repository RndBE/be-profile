<?php

namespace App\Http\Controllers;

use App\Models\Solutions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;

class AdminSolusiController extends Controller
{
    public function index()
    {
        $data = [
            'solutionss' => Solutions::orderBy('created_at', 'desc')->get(),
        ];
        return view('Admin.solutions.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $iconPath = null;
        if ($request->hasFile('icon')) {
            $originalName = $request->file('icon')->getClientOriginalName();
            $fileName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.webp';
            $iconPath = 'konten/solutions/icon/' . $fileName;
            $storagePath = storage_path('app/public/' . $iconPath);

            // Pastikan direktori tujuan ada
            if (!file_exists(dirname($storagePath))) {
                mkdir(dirname($storagePath), 0755, true);
            }

            // Baca file asli dan simpan sebagai webp
            $imageFromRequest = $request->file('icon')->getRealPath();

            Image::read($imageFromRequest)  // Gunakan Intervention Image
                ->toWebp()
                ->save($storagePath);
        }

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $originalName = $request->file('thumbnail')->getClientOriginalName();
            $fileName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.webp';
            $thumbnailPath = 'konten/solutions/thumbnail/' . $fileName;
            $storagePath = storage_path('app/public/' . $thumbnailPath);

            // Pastikan direktori tujuan ada
            if (!file_exists(dirname($storagePath))) {
                mkdir(dirname($storagePath), 0755, true);
            }

            // Baca file asli dan simpan sebagai webp
            $imageFromRequest = $request->file('thumbnail')->getRealPath();

            Image::read($imageFromRequest)  // Gunakan Intervention Image
                ->toWebp()
                ->save($storagePath);
        }

        // Simpan data ke database
        Solutions::create([
            'nama' => $request->nama,
            'description' => $request->description,
            'icon' => $iconPath,
            'thumbnail' => $thumbnailPath,
        ]);

        toast('Berhasil menambahkan data!', 'success');
        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        // Cari data yang akan diupdate berdasarkan ID
        $solution = Solutions::findOrFail($id);

        if ($request->hasFile('icon')) {
            // Hapus icon lama jika ada
            if ($solution->icon && Storage::exists('public/' . $solution->icon)) {
                Storage::delete('public/' . $solution->icon);
            }

            // Generate nama baru
            $originalName = $request->file('icon')->getClientOriginalName();
            $fileName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.webp';
            $imagePath = 'konten/solutions/icon/' . $fileName;
            $storagePath = storage_path('app/public/' . $imagePath);

            // Pastikan folder ada
            if (!file_exists(dirname($storagePath))) {
                mkdir(dirname($storagePath), 0755, true);
            }

            // Konversi dan simpan icon
            $imageFromRequest = $request->file('icon')->getRealPath();

            Image::read($imageFromRequest)
                ->toWebp()
                ->save($storagePath);

            $solution->icon = $imagePath;
        }

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($solution->thumbnail && Storage::exists('public/' . $solution->thumbnail)) {
                Storage::delete('public/' . $solution->thumbnail);
            }

            // Generate nama baru
            $originalName = $request->file('thumbnail')->getClientOriginalName();
            $fileName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.webp';
            $imagePath = 'konten/solutions/thumbnail/' . $fileName;
            $storagePath = storage_path('app/public/' . $imagePath);

            // Pastikan folder ada
            if (!file_exists(dirname($storagePath))) {
                mkdir(dirname($storagePath), 0755, true);
            }

            // Konversi dan simpan thumbnail
            $imageFromRequest = $request->file('thumbnail')->getRealPath();

            Image::read($imageFromRequest)
                ->toWebp()
                ->save($storagePath);

            $solution->thumbnail = $imagePath;
        }

        // Update data ke database
        $solution->nama = $request->nama;
        $solution->description = $request->description;
        $solution->save(); // Menyimpan perubahan ke database

        toast('Berhasil mengupdate data!', 'success');
        return redirect()->back();
    }



    public function destroy($id)
    {
        $solution = Solutions::findOrFail($id);

        if ($solution->icon && Storage::exists('public/' . $solution->icon)) {
            Storage::delete('public/' . $solution->icon);
        }

        if ($solution->thumbnail && Storage::exists('public/' . $solution->thumbnail)) {
            Storage::delete('public/' . $solution->thumbnail);
        }

        // Hapus data dari database
        $solution->delete();
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }

}
