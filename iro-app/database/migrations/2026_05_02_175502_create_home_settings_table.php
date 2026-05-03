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
        Schema::create('home_settings', function (Blueprint $table) {
        $table->id();

        // Hero Section
        $table->string('hero_title')->default('Western Mindanao State University');
        $table->string('hero_subtitle')->default('International Relations Office');
        $table->text('hero_description')->nullable();

        // The Seals Image
        $table->string('seals_image_path')->nullable();

        // Org Chart Section
        $table->string('org_chart_title')->default('Organizational Structure');
        $table->text('org_chart_description')->nullable();
        $table->string('org_chart_image_path')->nullable();

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_settings');
    }
};
