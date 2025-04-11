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


        // Path dasar ke public_html/konten (di luar folder Laravel project)
        $basePublicPath = base_path('../public_html/konten');

        // Menangani Icon
        $iconPath = null;
        if ($request->hasFile('icon')) {
            $fileName = time() . '_' . $request->file('icon')->getClientOriginalName();
            $destinationPath = $basePublicPath . '/kategori-topik/icon';

            // Pastikan foldernya ada
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Simpan file
            $request->file('icon')->move($destinationPath, $fileName);

            // Simpan path relatif ke database
            $iconPath = 'konten/kategori-topik/icon/' . $fileName;
        }

        // Menangani Thumbnail
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $fileName = time() . '.webp';
            $destinationPath = $basePublicPath . '/kategori-topik/thumbnail';

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $imageFromStorage = $request->file('thumbnail')->getRealPath();

            // Simpan sebagai .webp langsung ke public_html/konten
            Image::read($imageFromStorage)
                ->toWebp()
                ->save($destinationPath . '/' . $fileName);

            // Simpan path relatif ke database
            $thumbnailPath = 'konten/kategori-topik/thumbnail/' . $fileName;
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
        $basePublicPath = base_path('../public_html/konten');

        if ($request->hasFile('icon')) {
            // Hapus icon lama jika ada
            $oldIconPath = base_path('../public_html/' . $kategori_topiks->icon);
            if ($kategori_topiks->icon && file_exists($oldIconPath)) {
                unlink($oldIconPath);
            }

            // Simpan icon baru
            $fileName = time() . '_' . $request->file('icon')->getClientOriginalName();
            $destinationPath = $basePublicPath . '/kategori-topik/icon';

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $request->file('icon')->move($destinationPath, $fileName);
            $kategori_topiks->icon = 'konten/kategori-topik/icon/' . $fileName;
        }

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            $oldThumbPath = base_path('../public_html/' . $kategori_topiks->thumbnail);
            if ($kategori_topiks->thumbnail && file_exists($oldThumbPath)) {
                unlink($oldThumbPath);
            }

            // Konversi thumbnail ke webp
            $fileName = time() . '.webp';
            $destinationPath = $basePublicPath . '/kategori-topik/thumbnail';

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $webpFullPath = $destinationPath . '/' . $fileName;
            $imageFromStorage = $request->file('thumbnail')->getRealPath();

            Image::read($imageFromStorage)
                ->toWebp(90) // optional: kualitas 90%
                ->save($webpFullPath);

            // Simpan path di database
            $kategori_topiks->thumbnail = 'konten/kategori-topik/thumbnail/' . $fileName;
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
        if ($kategori_topiks->icon) {
            $iconPath = base_path('../public_html/' . $kategori_topiks->icon);
            if (file_exists($iconPath)) {
                unlink($iconPath);
            }
        }

        // Hapus thumbnail jika ada
        if ($kategori_topiks->thumbnail) {
            $thumbnailPath = base_path('../public_html/' . $kategori_topiks->thumbnail);
            if (file_exists($thumbnailPath)) {
                unlink($thumbnailPath);
            }
        }

        // Hapus data dari database
        $kategori_topiks->delete();
        // Tampilkan notifikasi berhasil
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }


}
