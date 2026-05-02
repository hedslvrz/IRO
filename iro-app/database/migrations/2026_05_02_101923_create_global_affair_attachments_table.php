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
        Schema::create('global_affair_attachments', function (Blueprint $table) {
        $table->id();
        // This links the attachment to the specific service. cascadeOnDelete means if the service is deleted, the files are too!
        $table->foreignId('global_affair_id')->constrained()->cascadeOnDelete();

        $table->enum('type', ['link', 'file']); // Tells us what kind of attachment this is
        $table->string('label'); // e.g., "Download Form A"
        $table->string('path_or_url'); // Holds either the file path or the https:// url

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_affair_attachments');
    }
};
