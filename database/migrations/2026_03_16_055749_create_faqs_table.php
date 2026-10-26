<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {

            $table->id();

            // Where this FAQ is shown
            $table->string('type')->default('general');   // general | service | industry
            $table->string('service')->nullable();        // main service key (route name)
            $table->string('sub_service')->nullable();    // sub service key (route name), null = main service FAQ
            $table->string('industry')->nullable();       // industry key (route name)

            $table->string('question');
            $table->text('answer');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->index(['type', 'status']);
            $table->index(['service', 'sub_service']);
            $table->index('industry');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};