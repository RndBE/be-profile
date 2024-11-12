<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Projek;
use Illuminate\Http\Request;
use App\Models\KategoriProjek;
use Illuminate\Support\Facades\Storage;

class AdminProjekController extends Controller
{
    public function index()
    {
        $data = [
            'projeks' => Projek::orderBy('created_at', 'desc')->paginate(10),
            'kliens' => Klien::all(),
            'kategoriProjeks' => KategoriProjek::all()
        ];
        return view('Admin.projek.index', $data);
    }

    public function create()
    {
        return view('Admin.projek.create', [
            'kliens' => Klien::all(),
            'kategoriProjeks' => KategoriProjek::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_projek' => 'required|string|max:255',
            'klien_id' => 'required|exists:klien,id',
            'kategori_projek_id' => 'required|exists:kategori_projek,id',
            'deskripsi' => 'nullable|string',
            'waktu' => 'nullable|integer|min:0',
        ]);

        Projek::create([
            'nama_projek' => $request->input('nama_projek'),
            'klien_id' => $request->input('klien_id'),
            'kategori_projek_id' => $request->input('kategori_projek_id'),
            'deskripsi' => $request->input('deskripsi'),
            'waktu' => $request->input('waktu'),
        ]);

        toast('Berhasil menambahkan data!','success');
        return redirect()->route('projek.index')->with('success', 'Projek berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $projek = Projek::findOrFail($id);
        $kliens = Klien::all();
        $kategoriProjeks = KategoriProjek::all();
        return view('Admin.projek.edit', compact('projek', 'kliens', 'kategoriProjeks'));
    }

    public function update(Request $request, $id)
    {
        $projek = Projek::findOrFail($id);

        $request->validate([
            'nama_projek' => 'required|string|max:255',
            'klien_id' => 'required|exists:klien,id',
            'kategori_projek_id' => 'required|exists:kategori_projek,id',
            'lokasi' => 'nullable|string|max:255',
            'website' => 'nullable|url',
            'waktu' => 'nullable|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $projek->update($request->all());

        toast('Berhasil mengubah data!','success');
        return redirect()->route('projek.index')->with('success', 'Projek berhasil diubah.');
    }


    public function destroy($id)
    {
        $projek = Projek::findOrFail($id);

        $projek->delete();

        toast('Berhasil menghapus data!','success');
        return redirect()->back();
    }

}
