<?php

namespace App\Http\Controllers;

use App\Models\TentangKami;
use Illuminate\Http\Request;
use App\Models\BerandaCarousel;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class TentangKamiController extends Controller
{
    public function index()
    {
        $data = [
            'tentangkami' => TentangKami::orderBy('created_at', 'desc')->get(),
        ];
        return view('Admin.tentang-kami.index', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'gambar_satu' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gambar_dua' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gambar_direktur' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gambar_komisaris' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gambar_administrasi' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gambar_marketing' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gambar_hardware' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gambar_software' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $gambarPaths = [];

        // Daftar field gambar yang ingin disimpan
        $gambarFields = [
            'gambar_satu', 'gambar_dua', 'gambar_direktur',
            'gambar_komisaris', 'gambar_administrasi',
            'gambar_marketing', 'gambar_hardware', 'gambar_software'
        ];

        // Proses penyimpanan gambar secara dinamis
        foreach ($gambarFields as $field) {
            if ($request->hasFile($field)) {
                $fileName = time() . '-' . $field . '.webp';
                $path = 'tentang-kami/' . $fileName;
                Storage::makeDirectory('public/tentang-kami');
                $imageFromStorage = $request->file($field)->getRealPath();

                // Konversi ke WebP dan simpan
                Image::read($imageFromStorage)
                    ->toWebp()
                    ->save(Storage::path('public/' . $path));

                $gambarPaths[$field] = $path;
            }
        }

        TentangKami::create($gambarPaths);

        toast('Berhasil menambahkan data!', 'success');
        return redirect()->back();
    }

    // public function update(Request $request, $id)
    // {
    //     $tentangKami = TentangKami::findOrFail($id);

    //     $request->validate([
    //         'gambar_satu' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    //         'gambar_dua' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    //         'gambar_direktur' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    //         'gambar_komisaris' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    //         'gambar_administrasi' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    //         'gambar_marketing' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    //         'gambar_hardware' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    //         'gambar_software' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    //     ]);

    //     $gambarFields = [
    //         'gambar_satu', 'gambar_dua', 'gambar_direktur', 'gambar_komisaris',
    //         'gambar_administrasi', 'gambar_marketing', 'gambar_hardware', 'gambar_software'
    //     ];

    //     foreach ($gambarFields as $field) {
    //         if ($request->hasFile($field)) {
    //             // Hapus gambar lama jika ada
    //             if ($tentangKami->$field && Storage::exists('public/' . $tentangKami->$field)) {
    //                 Storage::delete('public/' . $tentangKami->$field);
    //             }

    //             // Simpan gambar baru dalam format webp
    //             $fileName = time() . '_' . $field . '.webp';
    //             $filePath = 'tentang-kami/' . $fileName;

    //             Storage::makeDirectory('public/tentang-kami');
    //             $imageFromStorage = $request->file($field)->getRealPath();

    //             Image::read($imageFromStorage)
    //                 ->toWebp()
    //                 ->save(Storage::path('public/' . $filePath));

    //             $tentangKami->$field = $filePath;
    //         }
    //     }

    //     $tentangKami->save();

    //     toast('Berhasil memperbarui data!', 'success');
    //     return redirect()->back();
    // }

    public function update(Request $request, $id)
    {
        $tentangKami = TentangKami::findOrFail($id);

        $request->validate([
            'gambar_satu' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_dua' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_direktur' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_komisaris' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_administrasi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_marketing' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_hardware' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_software' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambarFields = [
            'gambar_satu', 'gambar_dua', 'gambar_direktur', 'gambar_komisaris',
            'gambar_administrasi', 'gambar_marketing', 'gambar_hardware', 'gambar_software'
        ];

        foreach ($gambarFields as $field) {
            if ($request->hasFile($field)) {
                // Hapus gambar lama jika ada
                if ($tentangKami->$field && Storage::exists('public/' . $tentangKami->$field)) {
                    Storage::delete('public/' . $tentangKami->$field);
                }

                // Simpan gambar dalam format asli
                $filePath = $request->file($field)->store('tentang-kami', 'public');
                $tentangKami->$field = $filePath;
            }
        }

        $tentangKami->save();

        toast('Berhasil memperbarui data!', 'success');
        return redirect()->back();
    }




    public function destroy($id)
    {
        $tentangkami = TentangKami::findOrFail($id);

        // Daftar kolom gambar yang harus dihapus
        $gambarFields = [
            'gambar_satu', 'gambar_dua', 'gambar_direktur',
            'gambar_komisaris', 'gambar_administrasi',
            'gambar_marketing', 'gambar_hardware', 'gambar_software'
        ];

        // Hapus setiap gambar jika ada
        foreach ($gambarFields as $field) {
            if ($tentangkami->$field && Storage::exists('public/' . $tentangkami->$field)) {
                Storage::delete('public/' . $tentangkami->$field);
            }
        }

        // Hapus data dari database
        $tentangkami->delete();

        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }

}
