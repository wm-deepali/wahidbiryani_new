<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();

            // Core (Contact page, modal, footer)
            $table->string('name');                         // e.g. "Aminabad Outlet"
            $table->text('address');
            $table->string('email')->nullable();            // falls back to settings.support_email
            $table->string('phones')->nullable();           // comma separated: "0522-2611878, +91 92366 13111"
            $table->string('whatsapp')->nullable();
            $table->text('map_url')->nullable();            // Google Maps embed URL (iframe src)
            $table->string('timings')->default('12:30 PM – 10:30 PM'); // modal

            // Online ordering (modal) - both null => modal shows "Call Now" instead
            $table->string('swiggy_url')->nullable();
            $table->string('zomato_url')->nullable();

            // Our Outlets page
            $table->string('title')->nullable();            // "Wahid Biryani Aminabad"
            $table->string('subtitle')->nullable();         // "The Real Taste of Mughlai Cuisine"
            $table->string('urdu_name')->nullable();        // "امین آباد"
            $table->text('description')->nullable();
            $table->string('badge_text')->nullable();       // "Since 1955 • Pride of Lucknow" / "Wahid Biryani Outlet"
            $table->string('badge_icon')->default('fa-solid fa-hotel'); // fa-crown, fa-fire, fa-hotel
            $table->boolean('is_flagship')->default(false); // adds "flagship" class on badge
            $table->json('amenities')->nullable();          // [{"icon":"fa-solid fa-award","label":"Since 1955"}, ...]
            $table->string('prep_time')->default('15 – 20 Minutes');
            $table->string('image')->nullable();            // e.g. assets/img/Aminabad.png
            $table->string('tag_text')->nullable();         // "✦ Aminabad Outlet • Since 1955"
            $table->string('tag_icon')->default('fa-solid fa-star');

            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('outlets');
    }
};