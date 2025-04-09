<?php

namespace App\Providers;

use App\Models\Solutions;
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
            $view->with('solutionss', Solutions::with('subSolutions')->orderBy('created_at', 'asc')->get());

            // Instagram Feed
            $accessToken = 'IGAAYUdMfrv05BZAFB0TWpwdF9PT1BMajFKWHJkU3lyc09SVXFMYjhMSHgtdnZARMDFFWmFCazQ4WUpud2lIbGRfWWtRT0pVTi1NblF3NmRJM2h5djJwNUlPZAzRpLVU4azA2U2x5MnZAqS3oydjFyaE1xRnJvbmtmVEppbWNuSnA1RQZDZD';

            $response = Http::withOptions(['verify' => false])->get('https://graph.instagram.com/me/media', [
                'fields' => 'id,media_type,media_url,permalink,thumbnail_url',
                'access_token' => $accessToken,
            ]);

            $feeds = [];
            if ($response->successful()) {
                $feeds = collect($response->json()['data'] ?? [])
                            ->take(6);
            }

            $view->with('instagramFeeds', $feeds);
        });


    }
}
