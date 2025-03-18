<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Produk;
use App\Models\Projek;
use Illuminate\Support\Str;
use App\Models\GambarProjek;
use App\Models\SubSolutions;
use Illuminate\Http\Request;
use App\Models\KategoriProjek;
use App\Models\SolusiProduk;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class AdminProdukController extends Controller
{
    public function index()
    {
        $data = [
            'produks' => Produk::orderBy('created_at', 'desc')->get(),
            'subSolutions' => SubSolutions::all(),
            'solusiProduk' => SolusiProduk::all()->pluck('nama', 'id')
        ];
        return view('Admin.produk.index', $data);
    }

    public function create()
    {
        return view('Admin.produk.create', [
            'subSolutions' => SubSolutions::all(),
            'solusiProduk' => SolusiProduk::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'sub_solution_id' => 'required|exists:sub_solution,id',
            'solusi_produk_id' => 'nullable|array',
            'solusi_produk_id.*' => 'exists:solusi_produk,id',
            'link_lkpp_lokal' => 'nullable|string',
            'link_lkpp_sektoral' => 'nullable|string',
            'deskripsi_thumbnail' => 'nullable|string',
            'deskripsi_produk' => 'nullable|string',
            'gambar_thumbnail_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'brosur' => 'nullable|mimes:pdf',
        ]);

        $thumbnailProdukPath = null;
        if ($request->hasFile('gambar_thumbnail_produk')) {
            $fileName = time() . '.webp';
            $thumbnailProdukPath = 'produk/gambar_thumbnail_produk/' . $fileName;
            Storage::makeDirectory('public/produk/gambar_thumbnail_produk');
            $imageFromStorage = $request->file('gambar_thumbnail_produk')->getRealPath();
            Image::read($imageFromStorage)
                ->toWebp()
                ->save(Storage::path('public/' . $thumbnailProdukPath));
        }

        $produkPath = null;
        if ($request->hasFile('gambar_produk')) {
            $fileName = time() . '.webp';
            $produkPath = 'produk/gambar_produk/' . $fileName;
            Storage::makeDirectory('public/produk/gambar_produk');
            $imageFromStorage = $request->file('gambar_produk')->getRealPath();
            Image::read($imageFromStorage)
                ->toWebp()
                ->save(Storage::path('public/' . $produkPath));
        }

        $brosurName = null;
        if ($request->hasFile('brosur')) {
            $fileName = time() . '_' . $request->file('brosur')->getClientOriginalName();
            $brosurPath = $request->file('brosur')->storeAs('public/produk/brosur', $fileName);
            $brosurName = 'produk/brosur/' . $fileName;
        }

        $slug = Str::slug($request->input('nama_produk'));

        $produk = Produk::create([
            'nama_produk' => $request->input('nama_produk'),
            'slug' => $slug,
            'sub_solution_id' => $request->input('sub_solution_id'),
            'solusi_produk_id' => $request->input('solusi_produk_id') ? json_encode($request->input('solusi_produk_id')) : null,
            'link_lkpp_lokal' => $request->input('link_lkpp_lokal'),
            'link_lkpp_sektoral' => $request->input('link_lkpp_sektoral'),
            'deskripsi_thumbnail' => $request->input('deskripsi_thumbnail'),
            'deskripsi_produk' => $request->input('deskripsi_produk'),
            'gambar_thumbnail_produk' => $thumbnailProdukPath,
            'gambar_produk' => $produkPath,
            'brosur' => $brosurName,
        ]);

        toast('Berhasil menambahkan data!', 'success');
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $subSolutions = SubSolutions::all();
        $solusiProduk = SolusiProduk::all();

        $produk->solusi_produk_id = $produk->solusi_produk_id ? json_decode($produk->solusi_produk_id, true) : [];

        return view('Admin.produk.edit', compact('produk', 'subSolutions', 'solusiProduk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'sub_solution_id' => 'required|exists:sub_solution,id',
            'link_lkpp_lokal' => 'nullable|string',
            'link_lkpp_sektoral' => 'nullable|string',
            'deskripsi_thumbnail' => 'nullable|string',
            'deskripsi_produk' => 'nullable|string',
            'gambar_thumbnail_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'brosur' => 'nullable|mimes:pdf',
            'solusi_produk_id' => 'nullable|array',
        ]);

        $slug = Str::slug($request->input('nama_produk'));

        $produk->solusi_produk_id = $request->has('solusi_produk_id')
        ? json_encode($request->input('solusi_produk_id'))
        : null;

        $produk->update($request->only([
            'nama_produk', 'sub_solution_id', 'link_lkpp_lokal', 'link_lkpp_sektoral', 'deskripsi_thumbnail', 'deskripsi_produk',
        ]));

        if ($request->hasFile('gambar_thumbnail_produk')) {
            if ($produk->gambar_thumbnail_produk && Storage::exists('public/' . $produk->gambar_thumbnail_produk)) {
                Storage::delete('public/' . $produk->gambar_thumbnail_produk);
            }
            $fileName = time() . '.webp';
            $gambar_thumbnail_produkPath = 'produk/gambar_thumbnail_produk/' . $fileName;
            Storage::makeDirectory('public/produk/gambar_thumbnail_produk');
            $imageFromStorage = $request->file('gambar_thumbnail_produk')->getRealPath();
            Image::read($imageFromStorage)
                ->toWebp()
                ->save(Storage::path('public/' . $gambar_thumbnail_produkPath));
            $produk->gambar_thumbnail_produk = $gambar_thumbnail_produkPath;
        }

        if ($request->hasFile('gambar_produk')) {
            if ($produk->gambar_produk && Storage::exists('public/' . $produk->gambar_produk)) {
                Storage::delete('public/' . $produk->gambar_produk);
            }
            $fileName = time() . '.webp';
            $gambar_produkPath = 'produk/gambar_produk/' . $fileName;
            Storage::makeDirectory('public/produk/gambar_produk');
            $imageFromStorage = $request->file('gambar_produk')->getRealPath();
            Image::read($imageFromStorage)
                ->toWebp()
                ->save(Storage::path('public/' . $gambar_produkPath));
            $produk->gambar_produk = $gambar_produkPath;
        }

        if ($request->hasFile('brosur')) {
            if ($produk->brosur) {
                Storage::disk('public')->delete($produk->brosur);
            }
            $fileName = time() . '_' . $request->file('brosur')->getClientOriginalName();
            $brosurPath = $request->file('brosur')->storeAs('public/produk/brosur/', $fileName);
            $brosurName = 'produk/brosur/' . $fileName;
            $produk->brosur = $brosurName;
        }
        $produk->slug = $slug;
        $produk->save();

        toast('Berhasil mengubah data!', 'success');
        return redirect()->back()->with('success', 'Produk berhasil diubah.');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        if ($produk->gambar_thumbnail_produk) {
            Storage::disk('public')->delete($produk->gambar_thumbnail_produk);
        }
        if ($produk->gambar_produk) {
            Storage::disk('public')->delete($produk->gambar_produk);
        }
        if ($produk->brosur) {
            Storage::disk('public')->delete($produk->brosur);
        }
        $produk->delete();
        toast('Berhasil menghapus data!', 'success');
        return redirect()->back();
    }

}
