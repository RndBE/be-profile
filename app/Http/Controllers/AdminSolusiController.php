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

        // Menangani Icon
        $iconPath = null;
        if ($request->hasFile('icon')) {
            $fileName = time() . '_' . $request->file('icon')->getClientOriginalName();
            $filePath = $request->file('icon')->storeAs('public/solutions/icon', $fileName);
            $iconPath = 'solutions/icon/' . $fileName;
        }

        // Menangani Thumbnail
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $fileName = time() . '.webp';
            $thumbnailPath = 'solutions/thumbnail/' . $fileName;
            Storage::makeDirectory('public/solutions/thumbnail');
            $imageFromStorage = $request->file('thumbnail')->getRealPath();
            Image::read($imageFromStorage)
                ->toWebp()
                ->save(Storage::path('public/' . $thumbnailPath));
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
        // Menangani Icon
        if ($request->hasFile('icon')) {
            // Hapus icon lama jika ada
            if ($solution->icon && Storage::exists('public/' . $solution->icon)) {
                Storage::delete('public/' . $solution->icon);
            }
            // Simpan icon baru
            $fileName = time() . '_' . $request->file('icon')->getClientOriginalName();
            $filePath = $request->file('icon')->storeAs('public/solutions/icon', $fileName);
            $solution->icon = 'solutions/icon/' . $fileName;
        }
        // Menangani Thumbnail
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($solution->thumbnail && Storage::exists('public/' . $solution->thumbnail)) {
                Storage::delete('public/' . $solution->thumbnail);
            }
            // Simpan thumbnail baru
            $fileName = time() . '.webp';
            $thumbnailPath = 'solutions/thumbnail/' . $fileName;
            Storage::makeDirectory('public/solutions/thumbnail');
            $imageFromStorage = $request->file('thumbnail')->getRealPath();
            Image::read($imageFromStorage)
                ->toWebp()
                ->save(Storage::path('public/' . $thumbnailPath));
            $solution->thumbnail = $thumbnailPath;
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
        // Cari data yang akan dihapus berdasarkan ID
        $solution = Solutions::findOrFail($id);
        // Hapus icon jika ada
        if ($solution->icon && Storage::exists('public/' . $solution->icon)) {
            Storage::delete('public/' . $solution->icon);
        }
        // Hapus thumbnail jika ada
        if ($solution->thumbnail && Storage::exists('public/' . $solution->thumbnail)) {
            Storage::delete('public/' . $solution->thumbnail);
        }
        // Hapus data dari database
        $solution->delete();
        // Tampilkan notifikasi berhasil
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }


}
