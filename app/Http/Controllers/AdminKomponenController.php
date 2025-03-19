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
use App\Models\KategoriProjek;
use App\Models\FiturSubSolutions;
use Illuminate\Support\Facades\Storage;

class AdminKomponenController extends Controller
{
    public function index()
    {
        $data = [
            'komponen' => Komponen::orderBy('created_at', 'desc')->get(),
            'produks' => Produk::all(),
        ];

        return view('Admin.komponen.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'produk_id' => 'required|exists:produk,id',
        ]);

        // Menangani Icon
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $fileName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $filePath = $request->file('gambar')->storeAs('public/komponen/gambar', $fileName);
            $gambarPath = 'komponen/gambar/' . $fileName;
        }

        // Simpan data ke database
        Komponen::create([
            'description' => $request->description,
            'gambar' => $gambarPath,
            'produk_id' => $request->produk_id,
        ]);

        toast('Berhasil menambahkan data!', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'produk_id' => 'required|exists:produk,id',
        ]);

        $komponen = Komponen::findOrFail($id);
        if ($request->hasFile('gambar')) {
            if ($komponen->gambar && Storage::exists('public/' . $komponen->gambar)) {
                Storage::delete('public/' . $komponen->gambar);
            }
            $fileName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $filePath = $request->file('gambar')->storeAs('public/komponen/gambar', $fileName);
            $komponen->gambar = 'komponen/gambar/' . $fileName;
        }
        $komponen->description = $request->description;
        $komponen->produk_id = $request->produk_id;
        $komponen->save();

        toast('Berhasil mengupdate data!', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $komponen = komponen::findOrFail($id);
        if ($komponen->gambar) {
            Storage::disk('public')->delete($komponen->gambar);
        }
        $komponen->delete();
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }

}
