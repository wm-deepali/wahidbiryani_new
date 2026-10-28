<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gallery_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('video_url')->nullable();      // YouTube / Facebook / Instagram link (when platform is not "upload")
            $table->string('video_file')->nullable();   // uploaded video path on the public disk (when platform = "upload")
            $table->string('platform', 20);             // youtube | facebook | instagram | upload
            $table->string('thumbnail')->nullable();    // optional poster; YouTube thumbnails are fetched automatically
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_videos');
    }
};