<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('author');
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade');

            $table->string('language')->default('Urdu');

            $table->string('cover_image')->nullable();

            $table->text('description')->nullable();

            $table->boolean('published')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
