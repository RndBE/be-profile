<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ConvertImagesToWebp extends Command
{
    protected $signature = 'images:convert-to-webp
                            {--dry-run : Tampilkan file yang akan dikonversi tanpa mengubah apapun}
                            {--keep-originals : Simpan file asli setelah konversi}
                            {--files-only : Hanya convert file, jangan update database}
                            {--db-only : Hanya update path di database, asumsikan file sudah diconvert}';

    protected $description = 'Konversi semua gambar PNG/JPG/JPEG yang ada ke format WebP dan update path di database';

    private $converted = 0;
    private $skipped = 0;
    private $failed = 0;
    private $savedBytes = 0;

    public function handle()
    {
        $isDryRun = $this->option('dry-run');
        $keepOriginals = $this->option('keep-originals');
        $filesOnly = $this->option('files-only');
        $dbOnly = $this->option('db-only');

        if ($isDryRun) {
            $this->info('🔍 DRY RUN MODE — tidak ada perubahan yang akan dilakukan');
            $this->newLine();
        }

        // Deteksi path storage yang benar
        $storagePath = $this->detectStoragePath();
        $this->info("📁 Storage path: {$storagePath}");
        $this->newLine();

        // ===== 1. PROJEK (thumbnail + gambar_proyek) =====
        $this->processTable(
            'Projek', 'projek',
            ['thumbnail', 'gambar_proyek'],
            $storagePath, $isDryRun, $keepOriginals, $filesOnly, $dbOnly
        );

        // ===== 2. GAMBAR PROJEK =====
        $this->processTable(
            'Gambar Projek', 'gambar_projek',
            ['gambar'],
            $storagePath, $isDryRun, $keepOriginals, $filesOnly, $dbOnly
        );

        // ===== 3. ARTIKEL (thumbnail) — tabel: detail_artikel =====
        $this->processTable(
            'Artikel', 'detail_artikel',
            ['thumbnail'],
            $storagePath, $isDryRun, $keepOriginals, $filesOnly, $dbOnly
        );

        // ===== 4. GAMBAR ARTIKEL =====
        $this->processTable(
            'Gambar Artikel', 'gambar_artikel',
            ['gambar'],
            $storagePath, $isDryRun, $keepOriginals, $filesOnly, $dbOnly
        );

        // ===== 5. SUB SOLUTION (icon) =====
        $this->processTable(
            'Sub Solution', 'sub_solution',
            ['icon'],
            $storagePath, $isDryRun, $keepOriginals, $filesOnly, $dbOnly
        );

        // ===== 6. GAMBAR SUBSOLUTION =====
        $this->processTable(
            'Gambar Subsolution', 'gambar_subsolution',
            ['gambar'],
            $storagePath, $isDryRun, $keepOriginals, $filesOnly, $dbOnly
        );

        // ===== 7. TENTANG KAMI =====
        $this->processTable(
            'Tentang Kami', 'tentang_kami',
            ['gambar_satu', 'gambar_dua', 'gambar_direktur', 'gambar_komisaris', 'gambar_administrasi', 'gambar_marketing', 'gambar_hardware', 'gambar_software'],
            $storagePath, $isDryRun, $keepOriginals, $filesOnly, $dbOnly
        );

        // ===== 8. SERTIFIKASI =====
        $this->processTable(
            'Sertifikasi', 'sertifikasi',
            ['gambar', 'icon'],
            $storagePath, $isDryRun, $keepOriginals, $filesOnly, $dbOnly
        );

        // ===== 9. IKLAN =====
        $this->processTable(
            'Iklan', 'iklan',
            ['gambar'],
            $storagePath, $isDryRun, $keepOriginals, $filesOnly, $dbOnly
        );

        // ===== SUMMARY =====
        $this->newLine();
        $this->info('═══════════════════════════════════════');
        $this->info('📊 SUMMARY');
        $this->info('═══════════════════════════════════════');
        $this->info("✅ Converted: {$this->converted}");
        $this->info("⏭️  Skipped:   {$this->skipped}");
        $this->info("❌ Failed:    {$this->failed}");

        if ($this->savedBytes > 0) {
            $savedMB = round($this->savedBytes / 1024 / 1024, 2);
            $this->info("💾 Saved:     {$savedMB} MB");
        }

        if ($isDryRun) {
            $this->newLine();
            $this->warn('Ini hanya dry run. Jalankan tanpa --dry-run untuk eksekusi.');
        }

        return 0;
    }

    /**
     * Detect where storage files actually live.
     * Could be storage/app/public/ (symlink) or public/storage/ (direct copy).
     */
    private function detectStoragePath(): string
    {
        // Cek apakah public/storage adalah symlink ke storage/app/public
        $publicStorage = public_path('storage');
        $storageAppPublic = storage_path('app/public');

        if (is_link($publicStorage)) {
            // Standard Laravel symlink — pakai storage/app/public
            return $storageAppPublic;
        }

        // Kalau public/storage bukan symlink tapi ada isinya (copy langsung dari server)
        if (is_dir($publicStorage)) {
            // Cek mana yang punya file lebih banyak
            $publicCount = count(glob($publicStorage . '/*/*') ?: []);
            $storageCount = count(glob($storageAppPublic . '/*/*') ?: []);

            if ($publicCount > $storageCount) {
                return $publicStorage;
            }
        }

        return $storageAppPublic;
    }

    private function processTable(string $label, string $table, array $columns, string $storagePath, bool $isDryRun, bool $keepOriginals, bool $filesOnly, bool $dbOnly): void
    {
        $this->newLine();
        $this->info("━━━ {$label} ━━━");

        try {
            $records = DB::table($table)->get();
        } catch (\Exception $e) {
            $this->error("  Tabel '{$table}' tidak ditemukan: " . $e->getMessage());
            return;
        }

        $count = 0;

        foreach ($records as $record) {
            foreach ($columns as $column) {
                if (!isset($record->$column) || empty($record->$column)) {
                    continue;
                }

                $currentPath = $record->$column;

                // Skip jika sudah webp
                if (str_ends_with(strtolower($currentPath), '.webp')) {
                    continue;
                }

                // Skip jika bukan image
                if (!preg_match('/\.(png|jpg|jpeg)$/i', $currentPath)) {
                    continue;
                }

                $count++;
                $fullPath = $storagePath . '/' . $currentPath;
                $newPath = preg_replace('/\.(png|jpg|jpeg)$/i', '.webp', $currentPath);
                $newFullPath = $storagePath . '/' . $newPath;

                if ($isDryRun) {
                    $exists = file_exists($fullPath) ? '✓' : '✗';
                    $this->line("  [{$exists}] {$currentPath} → {$newPath}");
                    $this->converted++;
                    continue;
                }

                // Convert file
                if (!$dbOnly) {
                    if (!file_exists($fullPath)) {
                        $this->warn("  ⚠ File tidak ditemukan: {$currentPath}");
                        $this->failed++;
                        continue;
                    }

                    try {
                        // Pastikan direktori tujuan ada
                        $dir = dirname($newFullPath);
                        if (!file_exists($dir)) {
                            mkdir($dir, 0755, true);
                        }

                        $originalSize = filesize($fullPath);

                        // Convert menggunakan Intervention Image
                        Image::read($fullPath)
                            ->toWebp(quality: 85)
                            ->save($newFullPath);

                        $newSize = filesize($newFullPath);
                        $this->savedBytes += ($originalSize - $newSize);

                        $savedPercent = $originalSize > 0 ? round((1 - $newSize / $originalSize) * 100, 1) : 0;
                        $this->line("  ✅ {$currentPath} → .webp (hemat {$savedPercent}%)");

                        // Hapus file lama jika tidak keep
                        if (!$keepOriginals && $fullPath !== $newFullPath) {
                            unlink($fullPath);
                        }
                    } catch (\Exception $e) {
                        $this->error("  ❌ Gagal convert {$currentPath}: " . $e->getMessage());
                        $this->failed++;
                        continue;
                    }
                }

                // Update database
                if (!$filesOnly) {
                    try {
                        DB::table($table)
                            ->where('id', $record->id)
                            ->update([$column => $newPath]);
                    } catch (\Exception $e) {
                        $this->error("  ❌ Gagal update DB untuk {$currentPath}: " . $e->getMessage());
                        $this->failed++;
                        continue;
                    }
                }

                $this->converted++;
            }
        }

        if ($count === 0) {
            $this->line("  ✓ Semua sudah WebP");
            $this->skipped++;
        }
    }
}
