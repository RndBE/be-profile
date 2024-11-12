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
        Schema::table('projek', function (Blueprint $table) {
            $table->string('lokasi')->nullable()->after('kategori_projek_id');
            $table->string('website')->nullable()->after('lokasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projek', function (Blueprint $table) {
            $table->dropColumn('lokasi');
            $table->dropColumn('website');
        });
    }
};
