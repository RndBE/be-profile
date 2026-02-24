<?php

namespace App\Providers;

use App\Models\InstagramToken;
use App\Models\Solutions;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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
                $response = $this->fetchInstagram(
                    'https://graph.instagram.com/me/media',
                    [
                        'fields' => 'id,media_type,media_url,permalink,thumbnail_url',
                        'access_token' => $accessToken,
                    ]
                );

                if ($response && $response->successful()) {
                    $feeds = collect($response->json('data', []))
                        ->map(function ($item) use ($accessToken) {
                            // VIDEO sering tidak punya media_url thumbnail yang stabil.
                            if (($item['media_type'] ?? null) === 'VIDEO') {
                                $item['media_url'] = $item['thumbnail_url'] ?? ($item['media_url'] ?? '');
                            }

                            // Jika IMAGE kosong, fetch detail per media.
                            if (($item['media_type'] ?? null) === 'IMAGE' && empty($item['media_url'])) {
                                $detailResponse = $this->fetchInstagram(
                                    "https://graph.instagram.com/{$item['id']}",
                                    [
                                        'fields' => 'id,media_url,thumbnail_url,permalink',
                                        'access_token' => $accessToken,
                                    ]
                                );

                                if ($detailResponse && $detailResponse->successful()) {
                                    $item['media_url'] = $detailResponse->json('media_url', '');
                                }
                            }

                            return $item;
                        })
                        ->take(6);
                }
            }

            $view->with('instagramFeeds', $feeds);
        });
    }

    private function fetchInstagram(string $url, array $query): ?Response
    {
        try {
            return Http::withOptions([
                'verify' => true,
                'curl' => [
                    CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                ],
            ])
                ->connectTimeout(10)
                ->timeout(20)
                ->retry(3, 500, function ($exception) {
                    return $exception instanceof ConnectionException;
                }, false)
                ->get($url, $query);
        } catch (ConnectionException $e) {
            Log::warning('Instagram API connection failed', [
                'url' => $url,
                'message' => $e->getMessage(),
            ]);
            return null;
        } catch (\Throwable $e) {
            Log::warning('Instagram API request failed', [
                'url' => $url,
                'message' => $e->getMessage(),
            ]);
            return null;
        }
    }
}
