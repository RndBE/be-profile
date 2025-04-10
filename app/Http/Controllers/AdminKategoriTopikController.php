<?php

namespace App\Http\Controllers;

use App\Models\KategoriTopik;
use App\Models\Solutions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;

class AdminKategoriTopikController extends Controller
{
    public function index()
    {
        $data = [
            'kategori_topiks' => KategoriTopik::orderBy('created_at', 'desc')->get(),
        ];
        return view('Admin.kategori-topik.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'icon.image' => 'File ikon harus berupa gambar.',
            'icon.mimes' => 'Ikon harus berformat jpeg, png, jpg, atau svg.',
            'icon.max' => 'Ukuran ikon maksimal 2MB.',
            'thumbnail.image' => 'File thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Thumbnail harus berformat jpeg, png, atau jpg.',
            'thumbnail.max' => 'Ukuran thumbnail maksimal 2MB.'
        ]);


        // Menangani Icon
        $iconPath = null;
        if ($request->hasFile('icon')) {
            $fileName = time() . '_' . $request->file('icon')->getClientOriginalName();
            $filePath = $request->file('icon')->storeAs('public/kategori-topik/icon', $fileName);
            $iconPath = 'kategori-topik/icon/' . $fileName;
        }
        // Menangani Thumbnail
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $fileName = time() . '_' . $request->file('thumbnail')->getClientOriginalName();
            $filePath = $request->file('thumbnail')->storeAs('public/kategori-topik/icon', $fileName);
            $thumbnailPath = 'kategori-topik/icon/' . $fileName;
        }
        // Menangani Thumbnail
        // $thumbnailPath = null;
        // if ($request->hasFile('thumbnail')) {
        //     $fileName = time() . '.webp';
        //     $thumbnailPath = 'kategori-topik/thumbnail/' . $fileName;
        //     Storage::makeDirectory('public/kategori-topik/thumbnail');
        //     $imageFromStorage = $request->file('thumbnail')->getRealPath();
        //     Image::read($imageFromStorage)
        //         ->toWebp()
        //         ->save(Storage::path('public/' . $thumbnailPath));
        // }




        // Simpan data ke database
        KategoriTopik::create([
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
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'icon.image' => 'File ikon harus berupa gambar.',
            'icon.mimes' => 'Ikon harus berformat jpeg, png, jpg, atau svg.',
            'icon.max' => 'Ukuran ikon maksimal 2MB.',
            'thumbnail.image' => 'File thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Thumbnail harus berformat jpeg, png, atau jpg.',
            'thumbnail.max' => 'Ukuran thumbnail maksimal 2MB.'
        ]);
        // Cari data yang akan diupdate berdasarkan ID
        $kategori_topiks = KategoriTopik::findOrFail($id);
        // Menangani Icon
        if ($request->hasFile('icon')) {
            // Hapus icon lama jika ada
            if ($kategori_topiks->icon && Storage::exists('public/' . $kategori_topiks->icon)) {
                Storage::delete('public/' . $kategori_topiks->icon);
            }
            // Simpan icon baru
            $fileName = time() . '_' . $request->file('icon')->getClientOriginalName();
            $filePath = $request->file('icon')->storeAs('public/kategori-topik/icon', $fileName);
            $kategori_topiks->icon = 'kategori-topik/icon/' . $fileName;
        }
        // Menangani Thumbnail
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($kategori_topiks->thumbnail && Storage::exists('public/' . $kategori_topiks->thumbnail)) {
                Storage::delete('public/' . $kategori_topiks->thumbnail);
            }
            // Simpan thumbnail baru
            $fileName = time() . '.webp';
            $thumbnailPath = 'kategori-topik/icon/' . $fileName;
            Storage::makeDirectory('public/kategori-topik/icon');
            $imageFromStorage = $request->file('thumbnail')->getRealPath();
            Image::read($imageFromStorage)
                ->toWebp()
                ->save(Storage::path('public/' . $thumbnailPath));
            $kategori_topiks->thumbnail = $thumbnailPath;
        }
        // Update data ke database
        $kategori_topiks->nama = $request->nama;
        $kategori_topiks->description = $request->description;
        $kategori_topiks->save(); // Menyimpan perubahan ke database

        toast('Berhasil mengupdate data!', 'success');
        return redirect()->back();
    }



    public function destroy($id)
    {
        // Cari data yang akan dihapus berdasarkan ID
        $kategori_topiks = KategoriTopik::findOrFail($id);
        // Hapus icon jika ada
        if ($kategori_topiks->icon && Storage::exists('public/' . $kategori_topiks->icon)) {
            Storage::delete('public/' . $kategori_topiks->icon);
        }
        // Hapus thumbnail jika ada
        if ($kategori_topiks->thumbnail && Storage::exists('public/' . $kategori_topiks->thumbnail)) {
            Storage::delete('public/' . $kategori_topiks->thumbnail);
        }
        // Hapus data dari database
        $kategori_topiks->delete();
        // Tampilkan notifikasi berhasil
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }


}
