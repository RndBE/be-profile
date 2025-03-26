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
        Schema::create('detail_artikel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_topik_id')->constrained('kategori_topik')->onUpdate('cascade');
            $table->string('judul')->nullable();
            $table->text('konten')->nullable();
            $table->string('thumbnail')->nullable();
            $table->timestamp('tanggal_publikasi')->nullable();
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->text('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_artikel');
    }
};
