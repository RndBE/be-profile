<?php

namespace App\Traits;

use Intervention\Image\Laravel\Facades\Image;

trait ConvertsToWebp
{
    /**
     * Convert uploaded image to WebP format and save to storage.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  string  $directory  e.g. 'artikel/thumbnail'
     * @param  int  $quality  WebP quality (0-100)
     * @return string  Relative path for database storage
     */
    protected function convertAndStoreWebp($file, string $directory, int $quality = 85): string
    {
        $originalName = $file->getClientOriginalName();
        $fileName = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.webp';
        $relativePath = $directory . '/' . $fileName;
        $storagePath = storage_path('app/public/' . $relativePath);

        // Pastikan direktori tujuan ada
        $dir = dirname($storagePath);
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        // Convert dan simpan sebagai WebP
        Image::read($file->getRealPath())
            ->toWebp(quality: $quality)
            ->save($storagePath);

        return $relativePath;
    }
}
