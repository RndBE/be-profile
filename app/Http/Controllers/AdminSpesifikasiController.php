<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Produk;
use App\Models\Projek;
use App\Models\Komponen;
use App\Models\Solutions;
use App\Models\Spesifikasi;
use App\Models\GambarProjek;
use App\Models\SubSolutions;
use Illuminate\Http\Request;
use App\Models\SeriPerangkat;
use App\Models\KategoriProjek;
use App\Models\FiturSubSolutions;
use App\Models\KategoriSpesifikasi;
use Illuminate\Support\Facades\Storage;

class AdminSpesifikasiController extends Controller
{
    public function index()
    {
        $data = [
            'Spesifikasi' => Spesifikasi::orderBy('created_at', 'desc')->get(),
            'kategoriSpesifikasi' => KategoriSpesifikasi::all(),
        ];

        return view('Admin.spesifikasi.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'kategori_id' => 'required|exists:kategori_spesifikasi,id',
        ]);

        // Simpan data ke database
        Spesifikasi::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
        ]);

        toast('Berhasil menambahkan data!', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string',
            'kategori_id' => 'required|exists:kategori_spesifikasi,id',
        ]);

        $Spesifikasi = Spesifikasi::findOrFail($id);

        $Spesifikasi->judul = $request->judul;
        $Spesifikasi->kategori_id = $request->kategori_id;
        $Spesifikasi->save();

        toast('Berhasil mengupdate data!', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $Spesifikasi = Spesifikasi::findOrFail($id);

        $Spesifikasi->delete();
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }

}
