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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk')->nullable();
            $table->string('slug')->nullable();
            $table->foreignId('sub_solution_id')->constrained('sub_solution')->onUpdate('cascade');
            $table->string('gambar_thumbnail_produk')->nullable();
            $table->text('deskripsi_thumbnail')->nullable();
            $table->string('gambar_produk')->nullable();
            $table->text('deskripsi_produk')->nullable();
            $table->string('brosur')->nullable();
            $table->string('link_lkpp_lokal')->nullable();
            $table->string('link_lkpp_sektoral')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
