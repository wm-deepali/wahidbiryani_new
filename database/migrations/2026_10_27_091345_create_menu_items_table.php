<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_category_id')->constrained('menu_categories')->cascadeOnDelete();
            $table->string('title');
            $table->string('serving', 100)->nullable();   // e.g. "Half (2 pcs)"
            $table->string('price', 50)->nullable();      // "180" or text such as "MRP"
            $table->text('description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};