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

            if ($accessToken) {
                $response = Http::withOptions(['verify' => false])->get('https://graph.instagram.com/me/media', [
                    'fields' => 'id,media_type,media_url,permalink,thumbnail_url',
                    'access_token' => $accessToken,
                ]);

                if ($response->successful()) {
                    $feeds = collect($response->json()['data'] ?? [])->map(function ($item) {
                        // Jika tipe video, ganti media_url dengan thumbnail_url
                        if ($item['media_type'] === 'VIDEO') {
                            $item['media_url'] = $item['thumbnail_url'] ?? $item['media_url'];
                        }
                        return $item;
                    })->take(6);
                }
            }

            $view->with('instagramFeeds', $feeds);
        });


    }
}
