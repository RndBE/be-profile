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

    public function show($slug, $subSlug = null)
    {
        // Ambil solusi berdasarkan slug
        $solution = Solutions::with('subSolutions')
            ->whereRaw("LOWER(REPLACE(nama, ' ', '-')) = ?", [Str::lower($slug)])
            ->firstOrFail();

        // Jika $subSlug kosong, arahkan ke subSolution pertama
        if (is_null($subSlug) && $solution->subSolutions->isNotEmpty()) {
            $firstSubSolution = $solution->subSolutions->first();
            return redirect()->route('solusi.show', [
                Str::slug($solution->nama),
                Str::slug($firstSubSolution->nama)
            ]);
        }

        // Ambil subSolution berdasarkan slug
        $subSolution = $solution->subSolutions()
            ->whereRaw("LOWER(REPLACE(nama, ' ', '-')) = ?", [Str::lower($subSlug)])
            ->with('fiturSubSolutions')
            ->first();

        // Siapkan data untuk view
        $data = [
            'solution' => $solution,
            'subSolution' => $subSolution,
            'kliens' => Klien::orderBy('created_at', 'desc')->get(),
            'carousels' => BerandaCarousel::orderBy('created_at', 'desc')->get(),
            'projeks' => Projek::orderBy('created_at', 'desc')->get(),
            'testimonis' => Testimoni::orderBy('created_at', 'desc')->paginate(10),
        ];

        return view('User.solusi.index', $data);
    }




}
