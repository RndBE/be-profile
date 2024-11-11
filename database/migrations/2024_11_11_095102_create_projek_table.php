<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projek', function (Blueprint $table) {
            $table->id();
            $table->string('nama_projek')->nullable();
            $table->foreignId('klien_id')->constrained('klien')->onUpdate('cascade');
            $table->foreignId('kategori_projek_id')->constrained('kategori_projek')->onUpdate('cascade');
            $table->string('deskripsi')->nullable();
            $table->int('waktu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projek');
    }
};
