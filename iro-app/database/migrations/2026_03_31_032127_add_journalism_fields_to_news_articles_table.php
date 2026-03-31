<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('news_articles', function (Blueprint $table) {
            $table->string('author')->nullable()->after('category');
            $table->text('lede')->nullable()->after('excerpt'); // The introductory section
            $table->text('nut_graf')->nullable()->after('lede'); // The paragraph explaining the value/context
            $table->text('quote')->nullable()->after('content'); // Pull quote or main quote
            $table->string('image_caption')->nullable()->after('cover_image');
            $table->string('tags')->nullable()->after('quote'); // Comma-separated tags
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news_articles', function (Blueprint $table) {
            $table->dropColumn(['author', 'lede', 'nut_graf', 'quote', 'image_caption', 'tags']);
        });
    }
};
