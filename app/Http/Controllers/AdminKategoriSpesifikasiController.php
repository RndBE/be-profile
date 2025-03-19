<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Produk;
use App\Models\Projek;
use App\Models\Komponen;
use App\Models\Solutions;
use App\Models\GambarProjek;
use App\Models\SubSolutions;
use Illuminate\Http\Request;
use App\Models\SeriPerangkat;
use App\Models\KategoriProjek;
use App\Models\FiturSubSolutions;
use App\Models\KategoriSpesifikasi;
use Illuminate\Support\Facades\Storage;

class AdminKategoriSpesifikasiController extends Controller
{
    public function index()
    {
        $data = [
            'kategoriSpesifikasi' => KategoriSpesifikasi::orderBy('created_at', 'desc')->get(),
        ];

        return view('Admin.kategori-spesifikasi.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string',
        ]);

        // Simpan data ke database
        KategoriSpesifikasi::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        toast('Berhasil menambahkan data!', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string',
        ]);

        $kategoriSpesifikasi = KategoriSpesifikasi::findOrFail($id);

        $kategoriSpesifikasi->nama_kategori = $request->nama_kategori;
        $kategoriSpesifikasi->save();

        toast('Berhasil mengupdate data!', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $kategoriSpesifikasi = KategoriSpesifikasi::findOrFail($id);

        $kategoriSpesifikasi->delete();
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }

}
