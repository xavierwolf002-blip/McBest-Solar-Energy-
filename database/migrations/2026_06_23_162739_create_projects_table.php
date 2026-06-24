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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('location', 100);
            $table->text('description');
            $table->string('image_url', 500);
            $table->string('image_public_id', 200)->nullable();
            $table->enum('category', ['residential', 'commercial', 'industrial'])->default('residential');
            $table->boolean('featured')->default(false);
            $table->integer('display_order')->default(0);
            $table->timestamps();

            $table->index(['featured', 'category']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
