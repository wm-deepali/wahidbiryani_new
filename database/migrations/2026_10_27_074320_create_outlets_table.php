<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->string('name');                         // e.g. "Aminabad Outlet"
            $table->text('address');
            $table->string('email')->nullable();            // falls back to settings.support_email
            $table->string('phones')->nullable();           // comma separated: "0522-2611878, +91 92366 13111"
            $table->string('whatsapp')->nullable();
            $table->text('map_url')->nullable();            // Google Maps embed URL (iframe src)
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