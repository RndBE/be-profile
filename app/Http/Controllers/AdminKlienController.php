<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klien;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class AdminKlienController extends Controller
{
    public function index()
    {
        $data = [
            'kliens' => Klien::orderBy('id', 'desc')->get(), // paginate the results
        ];
        return view('Admin.klien.index', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $imageName = null;
        if ($request->hasFile('logo')) {
            $originalName = $request->file('logo')->getClientOriginalName();
            $fileName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.webp';
            $imageName = 'klien/' . $fileName;
            $storagePath = storage_path('app/public/' . $imageName);

            // Pastikan direktori tujuan ada
            if (!file_exists(dirname($storagePath))) {
                mkdir(dirname($storagePath), 0755, true);
            }

            // Baca file asli dan simpan sebagai webp
            $imageFromRequest = $request->file('logo')->getRealPath();

            Image::read($imageFromRequest)  // Gunakan Intervention Image
                ->toWebp()
                ->save($storagePath);
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
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $klien = Klien::findOrFail($id);

        $klien->nama_perusahaan = $request->nama_perusahaan;

        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($klien->logo && Storage::exists('public/' . $klien->logo)) {
                Storage::delete('public/' . $klien->logo);
            }

            // Generate nama baru
            $originalName = $request->file('logo')->getClientOriginalName();
            $fileName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.webp';
            $imagePath = 'klien/' . $fileName;
            $storagePath = storage_path('app/public/' . $imagePath);

            // Pastikan folder ada
            if (!file_exists(dirname($storagePath))) {
                mkdir(dirname($storagePath), 0755, true);
            }

            // Konversi dan simpan logo
            $imageFromRequest = $request->file('logo')->getRealPath();

            Image::read($imageFromRequest)
                ->toWebp()
                ->save($storagePath);

            $klien->logo = $imagePath;
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
