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
        Schema::create('academic_programs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('college_id')->constrained()->cascadeOnDelete();
        $table->string('title');
        $table->string('slug')->unique();
        $table->string('category')->nullable();
        $table->string('degree_level')->nullable();
        $table->string('image')->nullable();
        $table->text('overview')->nullable();
        $table->text('opportunities')->nullable();

        // JSON columns for dynamic repeatable data
        $table->json('quick_facts')->nullable();
        $table->json('structure')->nullable();
        $table->json('eligibility')->nullable();
        $table->json('cta')->nullable();

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_programs');
    }
};
