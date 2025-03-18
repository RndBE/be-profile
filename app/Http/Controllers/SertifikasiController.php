<?php

namespace App\Http\Controllers;

use App\Models\Sertifikasi;
use App\Models\TentangKami;
use Illuminate\Http\Request;
use App\Models\BerandaCarousel;
use App\Models\SertifikasiAtas;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class SertifikasiController extends Controller
{
    public function index()
    {
        $data = [
            'sertifikasi' => Sertifikasi::orderBy('created_at', 'asc')->get(),
            'sertifikasi_atas' => SertifikasiAtas::orderBy('created_at', 'asc')->get(),
        ];
        return view('Admin.sertifikasi.index', $data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
        ]);

        // Inisialisasi data baru
        $sertifikasi = new Sertifikasi();

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('sertifikasi', 'public');
            $sertifikasi->gambar = $gambarPath;
        }

        // Upload icon jika ada
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('sertifikasi/icons', 'public');
            $sertifikasi->icon = $iconPath;
        }

        // Simpan data lainnya
        $sertifikasi->title = $request->title;
        $sertifikasi->sub_title = $request->sub_title;
        $sertifikasi->save();

        // Beri notifikasi sukses
        toast('Berhasil menambahkan data!', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $sertifikasi = Sertifikasi::findOrFail($id);

        // Validasi input
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
        ]);

        // Update gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($sertifikasi->gambar && Storage::exists('public/' . $sertifikasi->gambar)) {
                Storage::delete('public/' . $sertifikasi->gambar);
            }
            $gambarPath = $request->file('gambar')->store('sertifikasi', 'public');
            $sertifikasi->gambar = $gambarPath;
        }

        // Update icon jika ada file baru
        if ($request->hasFile('icon')) {
            // Hapus icon lama jika ada
            if ($sertifikasi->icon && Storage::exists('public/' . $sertifikasi->icon)) {
                Storage::delete('public/' . $sertifikasi->icon);
            }
            $iconPath = $request->file('icon')->store('sertifikasi/icons', 'public');
            $sertifikasi->icon = $iconPath;
        }

        // Update data lainnya
        $sertifikasi->title = $request->title;
        $sertifikasi->sub_title = $request->sub_title;
        $sertifikasi->save();

        toast('Berhasil memperbarui data!', 'success');
        return redirect()->back();
    }



    public function destroy($id)
    {
        $sertifikasi = Sertifikasi::findOrFail($id);

        // Hapus gambar jika ada
        if ($sertifikasi->gambar && Storage::exists('public/' . $sertifikasi->gambar)) {
            Storage::delete('public/' . $sertifikasi->gambar);
        }

        // Hapus icon jika ada
        if ($sertifikasi->icon && Storage::exists('public/' . $sertifikasi->icon)) {
            Storage::delete('public/' . $sertifikasi->icon);
        }

        // Hapus data dari database
        $sertifikasi->delete();

        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }


}
