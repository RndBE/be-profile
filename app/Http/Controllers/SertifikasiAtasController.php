<?php

namespace App\Http\Controllers;

use App\Models\Sertifikasi;
use App\Models\TentangKami;
use Illuminate\Http\Request;
use App\Models\BerandaCarousel;
use App\Models\SertifikasiAtas;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use App\Traits\ConvertsToWebp;

class SertifikasiAtasController extends Controller
{
    use ConvertsToWebp;
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'gambar_satu' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gambar_dua' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
            'header' => 'required|string|max:255',
            'sub_header' => 'nullable|string|max:255',
        ]);

        // Inisialisasi data baru
        $sertifikasi = new SertifikasiAtas();

        // Upload gambar_satu jika ada
        if ($request->hasFile('gambar_satu')) {
            $sertifikasi->gambar_satu = $this->convertAndStoreWebp($request->file('gambar_satu'), 'sertifikasi/gambar_satu');
        }

        // Upload gambar_dua jika ada
        if ($request->hasFile('gambar_dua')) {
            $sertifikasi->gambar_dua = $this->convertAndStoreWebp($request->file('gambar_dua'), 'sertifikasi/gambar_dua');
        }

        // Simpan data lainnya
        $sertifikasi->header = $request->header;
        $sertifikasi->sub_header = $request->sub_header;
        $sertifikasi->save();

        // Beri notifikasi sukses
        toast('Berhasil menambahkan data!', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $sertifikasi = SertifikasiAtas::findOrFail($id);

        // Validasi input
        $request->validate([
            'gambar_satu' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gambar_dua' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
            'header' => 'required|string|max:255',
            'sub_header' => 'nullable|string|max:255',
        ]);

        // Update gambar jika ada file baru
        if ($request->hasFile('gambar_satu')) {
            // Hapus gambar lama jika ada
            if ($sertifikasi->gambar_satu && Storage::exists('public/' . $sertifikasi->gambar_satu)) {
                Storage::delete('public/' . $sertifikasi->gambar_satu);
            }
            $sertifikasi->gambar_satu = $this->convertAndStoreWebp($request->file('gambar_satu'), 'sertifikasi/gambar_satu');
        }

        // Update icon jika ada file baru
        if ($request->hasFile('gambar_dua')) {
            // Hapus gambar_dua lama jika ada
            if ($sertifikasi->gambar_dua && Storage::exists('public/' . $sertifikasi->gambar_dua)) {
                Storage::delete('public/' . $sertifikasi->gambar_dua);
            }
            $sertifikasi->gambar_dua = $this->convertAndStoreWebp($request->file('gambar_dua'), 'sertifikasi/gambar_dua');
        }

        // Update data lainnya
        $sertifikasi->header = $request->header;
        $sertifikasi->sub_header = $request->sub_header;
        $sertifikasi->save();

        toast('Berhasil memperbarui data!', 'success');
        return redirect()->back();
    }



    public function destroy($id)
    {
        $sertifikasi = SertifikasiAtas::findOrFail($id);

        // Hapus gambar jika ada
        if ($sertifikasi->gambar_satu && Storage::exists('public/' . $sertifikasi->gambar_satu)) {
            Storage::delete('public/' . $sertifikasi->gambar_satu);
        }

        // Hapus icon jika ada
        if ($sertifikasi->gambar_dua && Storage::exists('public/' . $sertifikasi->gambar_dua)) {
            Storage::delete('public/' . $sertifikasi->gambar_dua);
        }

        // Hapus data dari database
        $sertifikasi->delete();

        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }


}
