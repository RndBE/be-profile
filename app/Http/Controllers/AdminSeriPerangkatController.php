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
use App\Models\SeriPerangkat;
use Illuminate\Support\Facades\Storage;

class AdminSeriPerangkatController extends Controller
{
    public function index()
    {
        $data = [
            'seriPerangkat' => SeriPerangkat::orderBy('created_at', 'desc')->get(),
        ];

        return view('Admin.seri-perangkat.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'seri_perangkat' => 'required|string',
            'jenis' => 'nullable|string',
            'gambar1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Menangani Icon
        $gambar1Path = null;
        if ($request->hasFile('gambar1')) {
            $fileName = time() . '_' . $request->file('gambar1')->getClientOriginalName();
            $filePath = $request->file('gambar1')->storeAs('public/seri_perangkat/gambar1', $fileName);
            $gambar1Path = 'seri_perangkat/gambar1/' . $fileName;
        }

        $gambar2Path = null;
        if ($request->hasFile('gambar2')) {
            $fileName = time() . '_' . $request->file('gambar2')->getClientOriginalName();
            $filePath = $request->file('gambar2')->storeAs('public/seri_perangkat/gambar2', $fileName);
            $gambar2Path = 'seri_perangkat/gambar2/' . $fileName;
        }

        // Simpan data ke database
        SeriPerangkat::create([
            'seri_perangkat' => $request->seri_perangkat,
            'jenis' => $request->jenis,
            'gambar1' => $gambar1Path,
            'gambar2' => $gambar2Path,
        ]);

        toast('Berhasil menambahkan data!', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'seri_perangkat' => 'required|string',
            'jenis' => 'nullable|string',
            'gambar1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $seri_perangkat = SeriPerangkat::findOrFail($id);
        if ($request->hasFile('gambar1')) {
            if ($seri_perangkat->gambar1 && Storage::exists('public/' . $seri_perangkat->gambar1)) {
                Storage::delete('public/' . $seri_perangkat->gambar1);
            }
            $fileName = time() . '_' . $request->file('gambar1')->getClientOriginalName();
            $filePath = $request->file('gambar1')->storeAs('public/seri_perangkat/gambar1', $fileName);
            $seri_perangkat->gambar1 = 'seri_perangkat/gambar1/' . $fileName;
        }
        if ($request->hasFile('gambar2')) {
            if ($seri_perangkat->gambar2 && Storage::exists('public/' . $seri_perangkat->gambar2)) {
                Storage::delete('public/' . $seri_perangkat->gambar2);
            }
            $fileName = time() . '_' . $request->file('gambar2')->getClientOriginalName();
            $filePath = $request->file('gambar2')->storeAs('public/seri_perangkat/gambar2', $fileName);
            $seri_perangkat->gambar2 = 'seri_perangkat/gambar2/' . $fileName;
        }
        $seri_perangkat->seri_perangkat = $request->seri_perangkat;
        $seri_perangkat->jenis = $request->jenis;
        $seri_perangkat->save();

        toast('Berhasil mengupdate data!', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $seri_perangkat = SeriPerangkat::findOrFail($id);
        if ($seri_perangkat->gambar1) {
            Storage::disk('public')->delete($seri_perangkat->gambar1);
        }
        if ($seri_perangkat->gambar2) {
            Storage::disk('public')->delete($seri_perangkat->gambar2);
        }
        $seri_perangkat->delete();
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }

}
