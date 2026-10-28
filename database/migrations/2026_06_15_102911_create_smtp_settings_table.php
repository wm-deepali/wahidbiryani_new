<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('smtp_settings', function (Blueprint $table) {

            $table->id();

            // ── SMTP connection ──────────────────────────────────────────────
            $table->string('smtp_host')->nullable();
            $table->integer('smtp_port')->nullable();

            $table->string('smtp_username')->nullable();
            $table->text('smtp_password')->nullable();

            $table->enum(
                'smtp_encryption',
                ['tls', 'ssl', 'none']
            )->default('tls');

            // ── Sender / Reply-to ────────────────────────────────────────────
            $table->string('from_name')->nullable();
            $table->string('from_email')->nullable();

            $table->string('reply_to_name')->nullable();
            $table->string('reply_to_email')->nullable();

            // ── Admin email notifications (one switch per enquiry type) ─────
            $table->boolean('notify_contact_enquiry')->default(true);
            $table->boolean('notify_feedback')->default(true);
            $table->boolean('notify_franchise_enquiry')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('smtp_settings');
    }
};