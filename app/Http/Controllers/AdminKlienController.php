<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klien;
use Illuminate\Support\Facades\Storage;

class AdminKlienController extends Controller
{
    public function index()
    {
        $data = [
            'kliens' => Klien::orderBy('created_at', 'desc')->get(), // paginate the results
        ];
        return view('Admin.klien.index', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imageName = null;
        if ($request->hasFile('logo')) {
            $fileName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('public/klien', $fileName);
            $imageName = 'klien/' . $fileName;
        }

        Klien::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'logo' => $imageName,
        ]);

        toast('Berhasil menambahkan data!','success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $klien = Klien::findOrFail($id);

        $klien->nama_perusahaan = $request->nama_perusahaan;

        if ($request->hasFile('logo')) {
            if ($klien->logo && Storage::exists('public/' . $klien->logo)) {
                Storage::delete('public/' . $klien->logo);
            }
            $fileName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('public/klien', $fileName);
            $klien->logo = 'klien/' . $fileName;
        }

        $klien->save();
        toast('Berhasil mengubah data!','success');
        return redirect()->back();
    }


    public function destroy($id)
    {
        $klien = Klien::findOrFail($id);

        if ($klien->logo && Storage::exists('public/' . $klien->logo)) {
            Storage::delete('public/' . $klien->logo);
        }

        $klien->delete();

        toast('Berhasil menghapus data!','success');
        return redirect()->back();
    }

}
