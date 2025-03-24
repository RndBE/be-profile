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
use App\Models\TentangKami;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BerandaCarousel;
use App\Models\Sertifikasi;
use App\Models\SertifikasiAtas;

class UserBandingkanPerangkatController extends Controller
{
    //
    public function index()
    {
        return view('User.bandingkan-perangkat.index');
    }

}
