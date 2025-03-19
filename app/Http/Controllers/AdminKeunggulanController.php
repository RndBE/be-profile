<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Produk;
use App\Models\Projek;
use App\Models\Komponen;
use App\Models\Solutions;
use App\Models\Keunggulan;
use App\Models\GambarProjek;
use App\Models\SubSolutions;
use Illuminate\Http\Request;
use App\Models\KategoriProjek;
use App\Models\FiturSubSolutions;
use Illuminate\Support\Facades\Storage;

class AdminKeunggulanController extends Controller
{
    public function index()
    {
        $data = [
            'keunggulan' => Keunggulan::orderBy('created_at', 'desc')->get(),
            'produks' => Produk::all(),
        ];

        return view('Admin.keunggulan.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'nama_keunggulan' => 'required|string',
            'produk_id' => 'required|exists:produk,id',
        ]);

        // Simpan data ke database
        Keunggulan::create([
            'description' => $request->description,
            'nama_keunggulan' => $request->nama_keunggulan,
            'produk_id' => $request->produk_id,
        ]);

        toast('Berhasil menambahkan data!', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string',
            'nama_keunggulan' => 'required|string',
            'produk_id' => 'required|exists:produk,id',
        ]);

        $keunggulan = Keunggulan::findOrFail($id);

        $keunggulan->nama_keunggulan = $request->nama_keunggulan;
        $keunggulan->description = $request->description;
        $keunggulan->produk_id = $request->produk_id;
        $keunggulan->save();

        toast('Berhasil mengupdate data!', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $keunggulan = Keunggulan::findOrFail($id);
        $keunggulan->delete();
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }

}
