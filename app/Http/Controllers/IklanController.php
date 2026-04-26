<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use App\Models\Sertifikasi;
use App\Models\TentangKami;
use Illuminate\Http\Request;
use App\Models\BerandaCarousel;
use App\Models\SertifikasiAtas;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use App\Traits\ConvertsToWebp;

class IklanController extends Controller
{
    use ConvertsToWebp;
    public function index()
    {
        $data = [
            'iklans' => Iklan::orderBy('created_at', 'asc')->get(),
        ];
        return view('Admin.iklan.index', $data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'judul' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'posisi' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
        ]);

        // Inisialisasi data baru
        $iklans = new Iklan();

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $iklans->gambar = $this->convertAndStoreWebp($request->file('gambar'), 'iklan');
        }

        // Simpan data lainnya
        $iklans->judul = $request->judul;
        $iklans->url = $request->url;
        $iklans->posisi = $request->posisi;
        $iklans->status = $request->status;
        $iklans->save();

        // Beri notifikasi sukses
        toast('Berhasil menambahkan data!', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $iklans = Iklan::findOrFail($id);

        // Validasi input
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'judul' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'posisi' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
        ]);

        // Update gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($iklans->gambar && Storage::exists('public/' . $iklans->gambar)) {
                Storage::delete('public/' . $iklans->gambar);
            }
            $iklans->gambar = $this->convertAndStoreWebp($request->file('gambar'), 'iklan');
        }

        // Update data lainnya
        $iklans->judul = $request->judul;
        $iklans->url = $request->url;
        $iklans->posisi = $request->posisi;
        $iklans->status = $request->status;
        $iklans->save();

        toast('Berhasil memperbarui data!', 'success');
        return redirect()->back();
    }



    public function destroy($id)
    {
        $iklans = Iklan::findOrFail($id);

        // Hapus gambar jika ada
        if ($iklans->gambar && Storage::exists('public/' . $iklans->gambar)) {
            Storage::delete('public/' . $iklans->gambar);
        }

        // Hapus data dari database
        $iklans->delete();

        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }


}
