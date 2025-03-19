<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Tabel Seri Logger
        Schema::create('seri_perangkat', function (Blueprint $table) {
            $table->id();
            $table->string('seri_perangkat');
            $table->string('gambar1')->nullable();
            $table->string('gambar2')->nullable();
            $table->timestamps();
        });

        Schema::table('produk', function (Blueprint $table) {
            $table->foreignId('seri_perangkat_id')->nullable()->constrained('seri_perangkat')->onUpdate('cascade')->onDelete('cascade');
        });

        // Tabel Kategori Spesifikasi
        Schema::create('kategori_spesifikasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->timestamps();
        });

        // Tabel Detail Spesifikasi
        Schema::create('spesifikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori_spesifikasi')->onUpdate('cascade')->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi');
            $table->timestamps();
        });

        // Tabel Relasi Seri Logger dengan Spesifikasi
        Schema::create('seri_perangkat_spesifikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seri_perangkat_id')->constrained('seri_perangkat')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('spesifikasi_id')->constrained('spesifikasi')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seri_perangkat_spesifikasi');
        Schema::dropIfExists('spesifikasi');
        Schema::dropIfExists('kategori_spesifikasi');
        Schema::dropIfExists('seri_perangkat');
    }
};
