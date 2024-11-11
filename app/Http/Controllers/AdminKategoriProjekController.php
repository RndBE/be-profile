<?php

namespace App\Http\Controllers;

use App\Models\KategoriProjek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminKategoriProjekController extends Controller
{
    public function index()
    {
        $data = [
            'kategori_pojeks' => KategoriProjek::orderBy('created_at', 'desc')->paginate(10), // paginate the results
        ];
        return view('Admin.kategori-projek.index', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        KategoriProjek::create([
            'nama' => $request->nama,
        ]);

        toast('Berhasil menambahkan data!','success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori_projek = KategoriProjek::findOrFail($id);

        $kategori_projek->nama = $request->nama;

        $kategori_projek->save();
        toast('Berhasil mengubah data!','success');
        return redirect()->back();
    }


    public function destroy($id)
    {
        $kategori_projek = KategoriProjek::findOrFail($id);

        $kategori_projek->delete();

        toast('Berhasil menghapus data!','success');
        return redirect()->back();
    }

}
