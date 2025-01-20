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

class ProdukController extends Controller
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

        return view('User.produk.index', $data);
    }

    public function show($slug)
    {

        $projek = Projek::whereRaw("LOWER(REPLACE(nama_projek, ' ', '-')) = ?", [Str::lower($slug)])
                    ->with('gambar')
                    ->firstOrFail();
        $data = [
            'kliens' => Klien::orderBy('created_at', 'desc')->get(),
            'carousels' => BerandaCarousel::orderBy('created_at', 'desc')->get(),
            'solutionss' => Solutions::with('subSolutions')->orderBy('created_at', 'asc')->get(),
            'projek' => $projek,
            'testimonis' => Testimoni::where('projek_id', $projek->id)->with('projek.klien')->orderBy('created_at', 'desc')->get(),
        ];
        return view('User.produk.show', $data);
    }

}
