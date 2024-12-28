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
        Schema::create('sub_solution', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->foreignId('solution_id')->constrained('solution')->onUpdate('cascade');
            $table->string('description1')->nullable();
            $table->string('description2')->nullable();
            $table->string('video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_solution');
    }
};
