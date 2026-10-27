<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();

            // Listing card + detail header
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->nullable();          // e.g. "Heritage" or "Heritage, Recipes"
            $table->string('urdu_accent')->nullable();       // small Urdu line above the H1
            $table->text('short_description')->nullable();   // card text + detail header subtitle

            // Images (paths relative to /public)
            $table->string('image')->nullable();             // listing card image
            $table->string('banner_image')->nullable();      // detail featured image (falls back to image)

            // Article body
            $table->longText('content')->nullable();

            // Sidebar info
            $table->string('author_name')->default('Wahid Archives');
            $table->string('author_title')->nullable()->default('Culinary Historian');
            $table->string('author_image')->nullable();
            $table->unsignedSmallInteger('read_time')->default(5);   // minutes
            $table->date('published_at')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};