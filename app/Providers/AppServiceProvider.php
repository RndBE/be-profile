<?php

namespace App\Providers;

use App\Models\Solutions;
use App\Models\InstagramToken;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('solutionss', Solutions::with('subSolutions')->orderBy('id', 'asc')->get());

            // Instagram Feed
            $latestToken = InstagramToken::latest()->first();

            $accessToken = $latestToken?->access_token;
            $feeds = [];

            // if ($accessToken) {
            //     $response = Http::withOptions(['verify' => false])->get('https://graph.instagram.com/me/media', [
            //         'fields' => 'id,media_type,media_url,permalink,thumbnail_url',
            //         'access_token' => $accessToken,
            //     ]);

            //     if ($response->successful()) {
            //         $feeds = collect($response->json()['data'] ?? [])->map(function ($item) use ($accessToken) {
            //             // Handle VIDEO: gunakan thumbnail_url jika ada
            //             if ($item['media_type'] === 'VIDEO') {
            //                 $item['media_url'] = $item['thumbnail_url'] ?? $item['media_url'] ?? '';
            //             }

            //             // Handle IMAGE: jika media_url kosong, ambil dari API individual
            //             if ($item['media_type'] === 'IMAGE' && empty($item['media_url'])) {
            //                 $detailResponse = Http::withOptions(['verify' => false])->get("https://graph.instagram.com/{$item['id']}", [
            //                     'fields' => 'id,media_url,thumbnail_url,permalink',
            //                     'access_token' => $accessToken,
            //                 ]);

            //                 if ($detailResponse->successful()) {
            //                     $detailData = $detailResponse->json();
            //                     $item['media_url'] = $detailData['media_url'] ?? '';
            //                 }
            //             }

            //             return $item;
            //         })->take(6);
            //     }
            // }

            $view->with('instagramFeeds', $feeds);
        });


    }
}
