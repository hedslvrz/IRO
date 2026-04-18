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
        Schema::create('sdgs', function (Blueprint $table) {
        $table->id();
        $table->integer('sdg_number')->unique(); // 1 to 17
        $table->string('title');
        $table->text('overview')->nullable();
        $table->string('image_path')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sdgs');
    }
};
