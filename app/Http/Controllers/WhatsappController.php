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
use Illuminate\Support\Facades\Http;

class WhatsappController extends Controller
{
    public function sendMessage(Request $request)
    {
        $nama = $request->input('nama');
        $phone = $request->input('phone');
        $question = $request->input('question');

        $message = "Halo, saya $nama.\nNomor: $phone\nPertanyaan: $question";

        $response = Http::withHeaders([
            'x-api-key' => env('WHATSAPP_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('http://103.82.241.100:3000/client/sendMessage/beacon', [
            'chatId' => "6285624390647@c.us",
            'contentType' => 'string',
            'content' => $message,
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }

}
