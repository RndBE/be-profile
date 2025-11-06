<?php

namespace App\Http\Controllers;

use App\Models\KategoriTopik;
use App\Models\kategori_topikss;
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

        $iconPath = null;
        if ($request->hasFile('icon')) {
            $originalName = $request->file('icon')->getClientOriginalName();
            $fileName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.webp';
            $iconPath = 'konten/kategori-topik/icon/' . $fileName;
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
            $thumbnailPath = 'konten/kategori-topik/thumbnail/' . $fileName;
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

            // Generate nama baru
            $originalName = $request->file('icon')->getClientOriginalName();
            $fileName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.webp';
            $imagePath = 'konten/kategori-topik/icon/' . $fileName;
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

            $kategori_topiks->icon = $imagePath;
        }

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($kategori_topiks->thumbnail && Storage::exists('public/' . $kategori_topiks->thumbnail)) {
                Storage::delete('public/' . $kategori_topiks->thumbnail);
            }

            // Generate nama baru
            $originalName = $request->file('thumbnail')->getClientOriginalName();
            $fileName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.webp';
            $imagePath = 'konten/kategori-topik/thumbnail/' . $fileName;
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

            $kategori_topiks->thumbnail = $imagePath;
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
