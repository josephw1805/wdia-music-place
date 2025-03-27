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
        Schema::create('album_chapter_tracks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->foreignId('artist_id')->constrained('users');
            $table->foreignId('album_id')->constrained('albums');
            $table->foreignId('chapter_id')->constrained('album_chapters')->onDelete('cascade');
            $table->text('file_path');
            $table->enum('storage', ['upload', 'external_link']);
            $table->string('volume')->nullable();
            $table->string('duration');
            $table->enum('file_type', ['video', 'audio'])->default('video');
            $table->boolean('downloadable')->default(0);
            $table->integer('order');
            $table->boolean('is_preview')->default(0);
            $table->boolean('status')->default(1);
            $table->enum('track_type', ['track', 'live']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_chapter_tracks');
    }
};
