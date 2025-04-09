<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Iklan;
use App\Models\Klien;
use App\Models\Pesan;
use App\Models\Projek;
use App\Models\Artikel;
use App\Models\Service;
use App\Models\Solutions;
use App\Models\Testimoni;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriTopik;
use App\Models\BerandaCarousel;

class UserPublikasiController extends Controller
{
    //
    function index()
    {
        $data = [
            'kategori_topiks' => KategoriTopik::all(),
            'artikels' => Artikel::where('status', 'published')->latest()->get(),
            'artikels_list' => Artikel::where('status', 'published')->latest()->skip(1)->take(2)->get(),
            'artikel_terbaru' => Artikel::where('status', 'published')->latest()->first(),
            'halaman_artikel_atas' => Iklan::where('posisi', 'halaman_artikel_atas')->where('status', 'aktif')->latest()->first(),
            'halaman_artikel_bawah' => Iklan::where('posisi', 'halaman_artikel_bawah')->where('status', 'aktif')->latest()->first(),
        ];

        return view('User.publikasi.index', $data);
    }

    public function show($slug)
    {

        $artikel = Artikel::where('slug', $slug)->with('gambar')->where('status', 'published')->first();

        $data = [
            'kategori_topiks' => KategoriTopik::all(),
            'artikel' => $artikel,
            'artikels_list' => Artikel::where('status', 'published')->where('kategori_topik_id', $artikel->kategori_topik_id)->where('id', '!=', $artikel->id)->latest()->take(3)->get(),
            'artikel_terbaru' => Artikel::where('status', 'published')->latest()->first(),
            'halaman_artikel_atas' => Iklan::where('posisi', 'halaman_artikel_atas')->where('status', 'aktif')->latest()->first(),
            'halaman_artikel_bawah' => Iklan::where('posisi', 'halaman_artikel_bawah')->where('status', 'aktif')->latest()->first(),
        ];

        return view('User.publikasi.show', $data);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $artikels = Artikel::where('status', 'published')
                    ->where(function ($q) use ($query) {
                        $q->where('judul', 'like', '%' . $query . '%')
                        ->orWhere('konten', 'like', '%' . $query . '%')
                        ->orWhereHas('kategoriTopik', function ($k) use ($query) {
                            $k->where('nama', 'like', '%' . $query . '%');
                        });
                    })
                    ->latest()->paginate(15);

        return view('User.publikasi.searchall', compact('artikels', 'query'));
    }


}
