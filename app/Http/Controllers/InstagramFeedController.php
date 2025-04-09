<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InstagramFeedController extends Controller
{
    public function index()
    {
        $accessToken = 'IGAAYUdMfrv05BZAFB0TWpwdF9PT1BMajFKWHJkU3lyc09SVXFMYjhMSHgtdnZARMDFFWmFCazQ4WUpud2lIbGRfWWtRT0pVTi1NblF3NmRJM2h5djJwNUlPZAzRpLVU4azA2U2x5MnZAqS3oydjFyaE1xRnJvbmtmVEppbWNuSnA1RQZDZD';

        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://graph.instagram.com/me/media', [
            'fields' => 'id,media_type,media_url,permalink,timestamp',
            'access_token' => $accessToken,
        ]);

        if ($response->failed()) {
            return abort(500, 'Failed to fetch Instagram feed.');
        }

        $feeds = collect($response->json()['data'] ?? [])
            ->where('media_type', 'IMAGE') // Hanya gambar
            ->sortByDesc('timestamp')      // Urutkan berdasarkan waktu terbaru
            ->take(6);                     // Ambil 6 postingan saja

        return view('instagram.feed', compact('feeds'));
    }

}
