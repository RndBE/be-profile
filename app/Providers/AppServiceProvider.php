<?php

namespace App\Providers;

use App\Models\InstagramToken;
use App\Models\Solutions;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
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
        // ✅ Hanya bind ke view layout yang benar-benar butuh data ini
        //    (bukan '*' yang menjalankan ulang di setiap sub-view)
        View::composer([
            'User.layouts.header',
            'User.layouts.app',
            'User.beranda.index',
        ], function ($view) {
            // ✅ Cache solutions menu selama 1 jam — data ini jarang berubah
            $solutions = Cache::remember('solutions_with_sub', 3600, function () {
                return Solutions::with('subSolutions')->orderBy('id', 'asc')->get();
            });
            $view->with('solutionss', $solutions);
        });

        // ✅ Instagram feed hanya dibutuhkan di footer
        View::composer('User.layouts.footer', function ($view) {
            // ✅ Cache Instagram feeds selama 30 menit
            $feeds = Cache::remember('instagram_feeds', 1800, function () {
                return $this->fetchInstagramFeeds();
            });
            $view->with('instagramFeeds', $feeds);
        });
    }

    /**
     * Fetch Instagram feeds — hanya dipanggil saat cache expired.
     */
    private function fetchInstagramFeeds(): array
    {
        $latestToken = InstagramToken::latest()->first();
        $accessToken = $latestToken?->access_token;

        if (!$accessToken) {
            return [];
        }

        $response = $this->fetchInstagram(
            'https://graph.instagram.com/me/media',
            [
                'fields' => 'id,media_type,media_url,permalink,thumbnail_url',
                'access_token' => $accessToken,
            ]
        );

        if (!$response || !$response->successful()) {
            return [];
        }

        return collect($response->json('data', []))
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
            ->take(6)
            ->toArray();
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
                ->connectTimeout(5)   // ✅ Turunkan dari 10 → 5 detik
                ->timeout(10)          // ✅ Turunkan dari 20 → 10 detik
                ->retry(2, 300, function ($exception) {  // ✅ Turunkan retry dari 3 → 2
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
