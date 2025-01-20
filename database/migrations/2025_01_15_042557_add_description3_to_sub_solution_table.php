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
        Schema::table('sub_solution', function (Blueprint $table) {
            $table->text('description3')->nullable()->after('description2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_solution', function (Blueprint $table) {
            $table->dropColumn('description3');
        });
    }
};
