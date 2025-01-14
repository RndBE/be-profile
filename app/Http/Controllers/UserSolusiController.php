<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Klien;
use App\Models\Pesan;
use App\Models\Projek;
use App\Models\Service;
use App\Models\Solutions;
use App\Models\Testimoni;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BerandaCarousel;

class UserSolusiController extends Controller
{
    //
    function index()
    {
        $data = [
            'kliens' => Klien::orderBy('created_at', 'desc')->get(),
            'carousels' => BerandaCarousel::orderBy('created_at', 'desc')->get(),
            'solutionss' => Solutions::with('subSolutions')->orderBy('created_at', 'asc')->get(),
            'projeks' => Projek::orderBy('created_at', 'desc')->get(),
            'testimonis' => Testimoni::with('projek.klien')->orderBy('created_at', 'desc')->paginate(10)
        ];

        return view('User.solusi.index', $data);
    }

    public function show($slug)
    {
        // Mengambil koleksi solusi, meskipun hanya satu
        $solutionss = Solutions::whereRaw("LOWER(REPLACE(nama, ' ', '-')) = ?", [Str::lower($slug)])
                                ->get(); // Ubah ke get() untuk mendapatkan koleksi

        $data = [
            'kliens' => Klien::orderBy('created_at', 'desc')->get(),
            'carousels' => BerandaCarousel::orderBy('created_at', 'desc')->get(),
            'solutionss' => $solutionss, // Pastikan mengirim koleksi
            'projeks' => Projek::orderBy('created_at', 'desc')->get(),
            'testimonis' => Testimoni::orderBy('created_at', 'desc'),
        ];
        return view('User.solusi.index', $data);
    }


}
