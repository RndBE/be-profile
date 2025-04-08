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
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string',
            'message' => 'required|string',
        ]);

        $data = [
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'messageText' => $request->message,
        ];

        Mail::send('User.emails.contact', $data, function ($message) use ($request) {
            $message->to('info@bejogja.com')
                    ->cc($request->email) // salinan ke pengirim
                    ->subject('Pesan dari Website Beacon Engineering');
        });

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }

}
