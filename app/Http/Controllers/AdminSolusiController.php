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

            // Arahkan ke public_html (keluar dari Laravel folder)
            $destinationPath = base_path('../public_html/konten/solutions/icon');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $request->file('icon')->move($destinationPath, $fileName);

            // URL relatif dari domain (akses via browser)
            $iconPath = 'konten/solutions/icon/' . $fileName;
        }

        // Menangani Thumbnail
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $fileName = time() . '.webp';
            $destinationPath = base_path('../public_html/konten/solutions/thumbnail');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $imageFromStorage = $request->file('thumbnail')->getRealPath();
            $fullPath = $destinationPath . '/' . $fileName;

            Image::read($imageFromStorage)
                ->toWebp()
                ->save($fullPath);

            $thumbnailPath = 'konten/solutions/thumbnail/' . $fileName;
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
            if ($solution->icon) {
                $oldIconPath = base_path('../public_html/' . $solution->icon);
                if (file_exists($oldIconPath)) {
                    unlink($oldIconPath);
                }
            }

            // Simpan icon baru
            $fileName = time() . '_' . $request->file('icon')->getClientOriginalName();
            $destinationPath = base_path('../public_html/konten/solutions/icon');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $request->file('icon')->move($destinationPath, $fileName);
            $solution->icon = 'konten/solutions/icon/' . $fileName;
        }

        // Menangani thumbnail
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($solution->thumbnail) {
                $oldThumbPath = base_path('../public_html/' . $solution->thumbnail);
                if (file_exists($oldThumbPath)) {
                    unlink($oldThumbPath);
                }
            }

            // Simpan thumbnail baru (konversi ke .webp)
            $fileName = time() . '.webp';
            $thumbnailPath = 'konten/solutions/thumbnail/' . $fileName;
            $fullSavePath = base_path('../public_html/' . $thumbnailPath);
            $thumbDir = dirname($fullSavePath);
            if (!file_exists($thumbDir)) {
                mkdir($thumbDir, 0755, true);
            }

            $imageFromStorage = $request->file('thumbnail')->getRealPath();
            Image::read($imageFromStorage)
                ->toWebp()
                ->save($fullSavePath);

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
        $solution = Solutions::findOrFail($id);
        // Hapus icon jika ada
        if ($solution->icon) {
            $iconPath = base_path('../public_html/' . $solution->icon);
            if (file_exists($iconPath)) {
                unlink($iconPath);
            }
        }
        // Hapus thumbnail jika ada
        if ($solution->thumbnail) {
            $thumbnailPath = base_path('../public_html/' . $solution->thumbnail);
            if (file_exists($thumbnailPath)) {
                unlink($thumbnailPath);
            }
        }
        // Hapus data dari database
        $solution->delete();
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }

}
