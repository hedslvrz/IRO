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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            // WMSU General Info
            $table->longText('wmsu_profile')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('quality_policy_1')->nullable();
            $table->text('quality_policy_2')->nullable();

            // IRO Specific Info (The 3 Pillars)
            $table->text('iro_mandate')->nullable();
            $table->longText('iro_functions')->nullable();
            $table->longText('iro_programs')->nullable();
            $table->longText('iro_services')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
