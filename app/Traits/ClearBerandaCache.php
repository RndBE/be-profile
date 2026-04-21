<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

/**
 * Trait untuk menghapus cache beranda ketika data berubah di admin panel.
 * Gunakan: use ClearBerandaCache; lalu panggil $this->clearBerandaCache('kliens')
 */
trait ClearBerandaCache
{
    /**
     * Hapus cache beranda berdasarkan tipe data.
     * 
     * @param string|array $types Tipe cache: 'kliens', 'carousels', 'projeks', 'testimonis', 'artikels', 'solutions', 'instagram'
     */
    protected function clearBerandaCache($types = 'all'): void
    {
        $cacheKeys = [
            'kliens'     => 'beranda_kliens',
            'carousels'  => 'beranda_carousels',
            'projeks'    => 'beranda_projeks',
            'testimonis' => 'beranda_testimonis',
            'artikels'   => 'beranda_artikels',
            'solutions'  => 'solutions_with_sub',
            'instagram'  => 'instagram_feeds',
        ];

        if ($types === 'all') {
            foreach ($cacheKeys as $key) {
                Cache::forget($key);
            }
            return;
        }

        $types = is_array($types) ? $types : [$types];

        foreach ($types as $type) {
            if (isset($cacheKeys[$type])) {
                Cache::forget($cacheKeys[$type]);
            }
        }
    }
}
