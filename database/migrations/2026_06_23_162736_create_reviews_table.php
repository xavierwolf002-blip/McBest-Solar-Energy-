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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 100);
            $table->string('customer_email', 100)->nullable();
            $table->string('customer_phone', 20)->nullable();
            $table->tinyInteger('rating');
            $table->string('service_type', 50);
            $table->string('title', 200)->nullable();
            $table->text('review_text');
            $table->string('image_url', 500)->nullable();
            $table->string('image_public_id', 200)->nullable();
            $table->string('location', 100);
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamp('responded_at')->nullable();
            $table->text('admin_response')->nullable();
            $table->string('response_author', 100)->nullable();
            $table->integer('helpful_count')->default(0);
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();

            $table->index(['rating', 'service_type', 'is_approved', 'is_featured', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
