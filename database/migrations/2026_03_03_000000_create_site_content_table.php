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
        Schema::create('site_content', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // e.g., 'hero_title', 'about_description', 'product_advantage_1', etc.
            $table->enum('content_type', ['text', 'image', 'textarea', 'number']); // Type of content
            $table->longText('content')->nullable(); // Text/textarea content
            $table->string('image_path')->nullable(); // Path to image
            $table->string('section')->nullable(); // Section name (hero, about, products, stats, etc.)
            $table->integer('order')->default(0); // For sorting multiple items
            $table->timestamps();
            
            $table->index('section');
            $table->index('key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_content');
    }
};
