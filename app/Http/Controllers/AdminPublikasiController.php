<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Klien;
use App\Models\Projek;
use App\Models\Artikel;
use App\Models\Solutions;
use Illuminate\Support\Str;
use App\Models\GambarProjek;
use App\Models\SubSolutions;
use Illuminate\Http\Request;
use App\Models\DetailArtikel;
use App\Models\GambarArtikel;
use App\Models\KategoriTopik;
use App\Models\KategoriProjek;
use App\Models\GambarSubsolution;
use Illuminate\Support\Facades\Storage;

class AdminPublikasiController extends Controller
{
    public function index()
    {
        $data = [
            'artikels' => Artikel::orderBy('created_at', 'desc')->get(),
            'kategori_topiks' => KategoriTopik::all(),
        ];
        return view('Admin.artikel.index', $data);
    }

    public function create()
    {
        return view('Admin.artikel.create', [
            'kategori_topiks' => KategoriTopik::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_topik_id' => 'required|exists:kategori_topik,id',
            'konten' => 'nullable|string',
            'status' => 'nullable|string|in:draft,published,archived',
            'slug' => 'nullable|string',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        // Buat slug berdasarkan judul
        $slug = Str::slug($request->judul);

        // Cek apakah slug sudah ada, jika ada tambahkan angka
        $count = Artikel::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $fileName = time() . '_' . $request->file('thumbnail')->getClientOriginalName();
            $filePath = $request->file('thumbnail')->storeAs('public/artikel/thumbnail', $fileName);
            $thumbnailPath = 'artikel/thumbnail/' . $fileName;
        }

        $tanggalPublikasi = $request->input('status') === 'published' ? Carbon::now('Asia/Jakarta')  : null;

        $artikels = Artikel::create([
            'judul' => $request->input('judul'),
            'kategori_topik_id' => $request->input('kategori_topik_id'),
            'konten' => $request->input('konten'),
            'thumbnail' => $thumbnailPath,
            'slug' => $slug,
            'status' => $request->input('status', 'draft'),
            'tanggal_publikasi' => $tanggalPublikasi,
        ]);

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $fileName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('public/artikel', $fileName);
                $imageName = 'artikel/' . $fileName;

                GambarArtikel::create([
                    'artikel_id' => $artikels->id,
                    'gambar' => $imageName,
                ]);
            }
        }

        toast('Berhasil menambahkan data!', 'success');
        return redirect()->route('artikel.index')->with('success', 'Sub Solutions berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $artikels = Artikel::with('gambar')->findOrFail($id);
        $kategoriTopik = KategoriTopik::all();
        return view('Admin.artikel.edit', compact('artikels', 'kategoriTopik'));
    }



    public function update(Request $request, $id)
    {
        $artikels = Artikel::with('gambar')->findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_topik_id' => 'required|exists:kategori_topik,id',
            'konten' => 'nullable|string',
            'status' => 'nullable|string|in:draft,published,archived',
            'slug' => 'nullable|string',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->input('judul') !== $artikels->judul) {
            $slug = Str::slug($request->input('judul'));

            // Cek apakah slug sudah ada di database
            $count = Artikel::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $id)->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 2);
            }
        } else {
            $slug = $artikels->slug; // Gunakan slug lama jika judul tidak berubah
        }

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($artikels->thumbnail && Storage::exists('public/' . $artikels->thumbnail)) {
                Storage::delete('public/' . $artikels->thumbnail);
            }
            // Simpan thumbnail baru
            $fileName = time() . '_' . $request->file('thumbnail')->getClientOriginalName();
            $filePath = $request->file('thumbnail')->storeAs('public/artikel/thumbnail', $fileName);
            $artikels->thumbnail = 'artikel/thumbnail/' . $fileName;
        }

        if ($request->input('status') === 'published' && $artikels->status !== 'published') {
            $artikels->tanggal_publikasi = Carbon::now('Asia/Jakarta');
        }

        $artikels->update([
            'judul' => $request->input('judul'),
            'kategori_topik_id' => $request->input('kategori_topik_id'),
            'konten' => $request->input('konten'),
            'status' => $request->input('status'),
            'slug' => $slug,
        ]);

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $imagePath = $file->storeAs('artikel', $fileName, 'public');
                GambarArtikel::create([
                    'artikel_id' => $artikels->id,
                    'gambar' => $imagePath,
                ]);
            }
        }

        $artikels->save();

        toast('Berhasil mengubah data!', 'success');
        return redirect()->back()->with('success', 'Sub Solutions berhasil diubah.');
    }

    public function removeImage(Request $request, $id)
    {
        $imageId = $request->input('image_id');
        $artikels = Artikel::findOrFail($id);
        $image = GambarArtikel::find($imageId);
        if ($image && $image->artikel_id == $artikels->id) {
            Storage::disk('public')->delete($image->gambar);
            $image->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Image not found or not part of the project.'], 404);
    }

    public function destroy($id)
    {
        $artikels = Artikel::findOrFail($id);

        if ($artikels->thumbnail && Storage::exists('public/' . $artikels->thumbnail)) {
            Storage::delete('public/' . $artikels->thumbnail);
        }

        foreach ($artikels->gambar as $image) {
            if (Storage::disk('public')->exists($image->gambar)) {
                Storage::disk('public')->delete($image->gambar);
            }
            $image->delete();
        }

        $artikels->delete();
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }

}
