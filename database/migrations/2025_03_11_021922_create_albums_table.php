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
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artist_id')->constrained('users');
            $table->foreignId('category_id')->nullable();
            $table->enum('album_type', ['album'])->default('album');
            $table->string('title');
            $table->string('slug');
            $table->string('seo_description')->nullable();
            $table->string('duration')->nullable();
            $table->string('time_zone')->nullable();
            $table->string('thumbnail')->nullable();
            $table->enum('demo_video_storage', ['upload', 'external_link'])->default('external_link')->nullable();
            $table->text('demo_video_source')->nullable();
            $table->text('description')->nullable();
            $table->integer('capacity')->nullable();
            $table->double('price')->nullable();
            $table->double('discount')->nullable();
            $table->boolean('certificate')->default(1)->nullable();
            $table->boolean('qna')->default(1)->nullable();
            $table->text('message_for_reviewer')->nullable();
            $table->enum('is_approved', ['pending', 'approved', 'rejected'])->default('pending');
            $table->enum('status', ['active', 'inactive', 'draft'])->default('draft');
            $table->foreignId('genre_id')->nullable();
            $table->foreignId('language_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
