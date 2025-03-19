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
use App\Models\SeriPerangkatSpesifikasi;
use Illuminate\Support\Facades\Storage;

class AdminSeriPerangkatSpesifikasiController extends Controller
{
    public function index()
    {
        $data = [
            'seriPerangkatSpesifikasi' => SeriPerangkatSpesifikasi::orderBy('created_at', 'desc')->get(),
            'Spesifikasi' => Spesifikasi::with('dataKategoriSpesifikasi')->get(),
            'seriPerangkat' => SeriPerangkat::all(),
        ];

        return view('Admin.seri-perangkat-spesifikasi.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required|string',
            'spesifikasi_id' => 'required|exists:spesifikasi,id',
            'seri_perangkat_id' => 'required|exists:seri_perangkat,id',
        ]);

        // Simpan data ke database
        SeriPerangkatSpesifikasi::create([
            'deskripsi' => $request->deskripsi,
            'spesifikasi_id' => $request->spesifikasi_id,
            'seri_perangkat_id' => $request->seri_perangkat_id,
        ]);

        toast('Berhasil menambahkan data!', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required|string',
            'spesifikasi_id' => 'required|exists:spesifikasi,id',
            'seri_perangkat_id' => 'required|exists:seri_perangkat,id',
        ]);

        $Spesifikasi = SeriPerangkatSpesifikasi::findOrFail($id);

        $Spesifikasi->deskripsi = $request->deskripsi;
        $Spesifikasi->spesifikasi_id = $request->spesifikasi_id;
        $Spesifikasi->seri_perangkat_id = $request->seri_perangkat_id;
        $Spesifikasi->save();

        toast('Berhasil mengupdate data!', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $Spesifikasi = SeriPerangkatSpesifikasi::findOrFail($id);

        $Spesifikasi->delete();
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }

}
