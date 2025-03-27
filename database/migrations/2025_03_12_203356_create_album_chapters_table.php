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
        Schema::create('album_chapters', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('artist_id')->constrained('users');
            $table->foreignId('album_id')->constrained('albums')->onDelete('cascade');
            $table->integer('order');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_chapters');
    }
};
