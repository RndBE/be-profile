<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Klien;
use App\Models\Pesan;
use App\Models\Projek;
use App\Models\Artikel;
use App\Models\Service;
use App\Models\Solutions;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use App\Models\BerandaCarousel;
use Illuminate\Support\Facades\Cache;

class UserBerandaController extends Controller
{
    //
    function index()
    {
        $data = [
            // ✅ Cache klien selama 1 jam, ambil hanya kolom yang dibutuhkan
            'kliens' => Cache::remember('beranda_kliens', 3600, function () {
                return Klien::select('id', 'nama_perusahaan', 'logo')
                    ->orderBy('id', 'desc')
                    ->get();
            }),

            // ✅ Cache carousel selama 1 jam
            'carousels' => Cache::remember('beranda_carousels', 3600, function () {
                return BerandaCarousel::select('id', 'judul', 'sub_judul', 'gambar')
                    ->orderBy('created_at', 'desc')
                    ->get();
            }),

            // ✅ Cache proyek untuk slider (batasi 12 terbaru, ambil kolom yang dipakai saja)
            'projeks' => Cache::remember('beranda_projeks', 3600, function () {
                return Projek::select('id', 'nama_projek', 'slug', 'thumbnail', 'waktu')
                    ->orderBy('waktu', 'desc')
                    ->limit(12)
                    ->get();
            }),

            // ✅ Cache testimoni selama 1 jam
            'testimonis' => Cache::remember('beranda_testimonis', 3600, function () {
                return Testimoni::with(['projek:id,nama_projek,klien_id', 'projek.klien:id,nama_perusahaan,logo'])
                    ->orderBy('created_at', 'desc')
                    ->limit(10)
                    ->get();
            }),

            // ✅ Cache artikel terbaru selama 30 menit
            'artikels_terbaru' => Cache::remember('beranda_artikels', 1800, function () {
                return Artikel::select('id', 'judul', 'slug', 'thumbnail', 'created_at')
                    ->where('status', 'published')
                    ->latest()
                    ->take(3)
                    ->get();
            }),
        ];
        return view('User.beranda.index', $data);
    }
}
