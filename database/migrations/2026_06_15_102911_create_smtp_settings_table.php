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

            // ── Admin recipients: Business / Service enquiry ─────────────────
            $table->string('enquiry_admin_to')->nullable()
                  ->comment('e.g. business@webmingo.com');
            $table->string('enquiry_admin_cc')->nullable()
                  ->comment('e.g. webmingo@gmail.com, comma separated if multiple');

            // ── Admin recipients: Career applications ────────────────────────
            $table->string('career_admin_to')->nullable()
                  ->comment('e.g. hr@webmingo.com');
            $table->string('career_admin_cc')->nullable()
                  ->comment('e.g. hr.webmingo@gmail.com, comma separated if multiple');

            // ── Email event toggles ──────────────────────────────────────────
            $table->boolean('customer_thank_you')->default(true)
                  ->comment('Thank you email to customer, only if mobile verified');
            $table->boolean('candidate_thank_you')->default(true)
                  ->comment('Thank you email to candidate, only if mobile verified');
            $table->boolean('admin_customer_detail')->default(true)
                  ->comment('Customer detail email to admin on every enquiry');
            $table->boolean('admin_candidate_detail')->default(true)
                  ->comment('Candidate detail + resume email to admin on every application');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('smtp_settings');
    }
};