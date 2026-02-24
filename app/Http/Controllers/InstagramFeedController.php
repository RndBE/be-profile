<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class InstagramFeedController extends Controller
{
    public function index()
    {
        $accessToken = 'IGAAYUdMfrv05BZAFB0TWpwdF9PT1BMajFKWHJkU3lyc09SVXFMYjhMSHgtdnZARMDFFWmFCazQ4WUpud2lIbGRfWWtRT0pVTi1NblF3NmRJM2h5djJwNUlPZAzRpLVU4azA2U2x5MnZAqS3oydjFyaE1xRnJvbmtmVEppbWNuSnA1RQZDZD';

        try {
            $response = Http::withOptions([
                'verify' => false,
                'curl' => [
                    CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                ],
            ])
                ->connectTimeout(10)
                ->timeout(20)
                ->retry(3, 500, function ($exception) {
                    return $exception instanceof ConnectionException;
                }, false)
                ->get('https://graph.instagram.com/me/media', [
                    'fields' => 'id,media_type,media_url,permalink,timestamp',
                    'access_token' => $accessToken,
                ]);
        } catch (ConnectionException $e) {
            return abort(503, 'Instagram API connection failed.');
        }

        if (! $response || $response->failed()) {
            return abort(500, 'Failed to fetch Instagram feed.');
        }

        $feeds = collect($response->json()['data'] ?? [])
            ->where('media_type', 'IMAGE')
            ->sortByDesc('timestamp')
            ->take(6);

        return view('instagram.feed', compact('feeds'));
    }
}
