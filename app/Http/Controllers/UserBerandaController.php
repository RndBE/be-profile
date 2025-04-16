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

class UserBerandaController extends Controller
{
    //
    function index()
    {
        $data = [
            'kliens' => Klien::orderBy('id', 'desc')->get(),
            'carousels' => BerandaCarousel::orderBy('created_at', 'desc')->get(),
            'solutionss' => Solutions::with('subSolutions')->orderBy('created_at', 'asc')->get(),
            'projeks' => Projek::orderBy('waktu', 'desc')->get(),
            'testimonis' => Testimoni::with('projek.klien')->orderBy('created_at', 'desc')->paginate(10),
            'artikels_terbaru' => Artikel::where('status', 'published')->latest()->take(3)->get()
        ];
        return view('User.beranda.index', $data);
    }
}
