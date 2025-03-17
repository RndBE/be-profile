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
        Schema::create('tentang_kami', function (Blueprint $table) {
            $table->id();
            $table->string('gambar_satu')->nullable();
            $table->string('gambar_dua')->nullable();
            $table->string('gambar_direktur')->nullable();
            $table->string('gambar_komisaris')->nullable();
            $table->string('gambar_administrasi')->nullable();
            $table->string('gambar_marketing')->nullable();
            $table->string('gambar_hardware')->nullable();
            $table->string('gambar_software')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang_kami');
    }
};
