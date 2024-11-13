<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Projek;
use App\Models\GambarProjek;
use Illuminate\Http\Request;
use App\Models\KategoriProjek;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Storage;

class AdminTestimoniController extends Controller
{
    public function index()
    {
        $projects = Projek::all();
        $data = [
            'testimonis' => Testimoni::with('projek.klien')->orderBy('created_at', 'desc')->paginate(10),
            'projects' => $projects,
        ];
        return view('Admin.testimoni.index', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_user' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'projek_id' => 'required|exists:projek,id',
            'brosur' => 'nullable|file|mimes:pdf,jpeg,jpg,png|max:2048',
            'testimoni' => 'nullable|string',
        ]);

        if ($request->hasFile('brosur')) {
            $brosurPath = $request->file('brosur')->store('brosur', 'public');
        } else {
            $brosurPath = null;
        }

        $testimoni = Testimoni::create([
            'nama_user' => $validated['nama_user'],
            'jabatan' => $validated['jabatan'],
            'projek_id' => $validated['projek_id'],
            'brosur' => $brosurPath,
            'testimoni' => $validated['testimoni'],
        ]);

        toast('Testimoni berhasil disimpan!', 'success');
        return redirect()->route('testimoni.index');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'projek_id' => 'required|exists:projek,id',
            'brosur' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:2048',
            'testimoni' => 'nullable|string',
        ]);

        $testimoni = Testimoni::findOrFail($id);
        $testimoni->nama_user = $request->nama_user;
        $testimoni->jabatan = $request->jabatan;
        $testimoni->projek_id = $request->projek_id;
        $testimoni->testimoni = $request->testimoni;

        if ($request->hasFile('brosur')) {
            if ($testimoni->brosur) {
                Storage::delete('public/' . $testimoni->brosur);
            }
            $testimoni->brosur = $request->file('brosur')->store('brosur', 'public');
        }

        $testimoni->save();
        toast('Berhasil mengubah data!', 'success');
        return redirect()->route('testimoni.index');
    }




    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        if ($testimoni->brosur) {
            Storage::delete('public/' . $testimoni->brosur);
        }
        $testimoni->delete();

        toast('Testimoni berhasil dihapus!', 'success');
        return redirect()->route('testimoni.index');
    }


}
