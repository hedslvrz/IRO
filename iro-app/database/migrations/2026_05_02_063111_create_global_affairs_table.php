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
        Schema::create('global_affairs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');

            // Flexible Fields (Admin can leave these blank!)
            $table->string('external_link')->nullable(); // For Facebook links, etc.
            $table->string('link_label')->nullable();    // E.g., "View on Facebook"

            $table->string('file_path')->nullable();     // For downloadable forms
            $table->string('file_label')->nullable();    // E.g., "Download Travel Form"

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('global_affairs');
    }
};
