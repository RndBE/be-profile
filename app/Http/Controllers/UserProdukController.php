<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Klien;
use App\Models\Pesan;
use App\Models\Produk;
use App\Models\Projek;
use App\Models\Service;
use App\Models\Solutions;
use App\Models\Testimoni;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BerandaCarousel;

class UserProdukController extends Controller
{
    public function show($slug)
    {
        $data = [
            'produk' => Produk::where('slug', $slug)->firstOrFail(),
        ];
        return view('User.produk.index', $data);
    }

}
