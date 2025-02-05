<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Projek;
use App\Models\Solutions;
use App\Models\GambarProjek;
use App\Models\SubSolutions;
use Illuminate\Http\Request;
use App\Models\KategoriProjek;
use App\Models\FiturSubSolutions;
use App\Models\SolusiProduk;
use Illuminate\Support\Facades\Storage;

class AdminSolusiProdukController extends Controller
{
    public function index()
    {
        $data = [
            'solusiproduks' => SolusiProduk::orderBy('created_at', 'desc')->get(),
        ];
        return view('Admin.solusi-produk.index', $data);
    }

    // public function create()
    // {
    //     return view('Admin.fitur-sub-solutions.create', [
    //         'subsolutions' => SubSolutions::all(),
    //     ]);
    // }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Menangani Icon
        $iconPath = null;
        if ($request->hasFile('icon')) {
            $fileName = time() . '_' . $request->file('icon')->getClientOriginalName();
            $filePath = $request->file('icon')->storeAs('public/produk/solusi-produk', $fileName);
            $iconPath = 'produk/solusi-produk/' . $fileName;
        }

        // Simpan data ke database
        SolusiProduk::create([
            'nama' => $request->nama,
            'icon' => $iconPath,
        ]);

        toast('Berhasil menambahkan data!', 'success');
        return redirect()->back();
    }


    // public function edit($id)
    // {
    //     $subSolution = SubSolutions::findOrFail($id);
    //     $solutions = Solutions::all();
    //     return view('Admin.sub-solutions.edit', compact('subSolution', 'solutions'));
    // }



    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $solusiproduk = SolusiProduk::findOrFail($id);
        if ($request->hasFile('icon')) {
            if ($solusiproduk->icon && Storage::exists('public/' . $solusiproduk->icon)) {
                Storage::delete('public/' . $solusiproduk->icon);
            }
            $fileName = time() . '_' . $request->file('icon')->getClientOriginalName();
            $filePath = $request->file('icon')->storeAs('public/produk/solusi-produk', $fileName);
            $solusiproduk->icon = 'produk/solusi-produk/' . $fileName;
        }
        $solusiproduk->nama = $request->nama;
        $solusiproduk->save();

        toast('Berhasil mengupdate data!', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $solusiproduk = SolusiProduk::findOrFail($id);
        if ($solusiproduk->icon) {
            Storage::disk('public')->delete($solusiproduk->icon);
        }
        $solusiproduk->delete();
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }

}
