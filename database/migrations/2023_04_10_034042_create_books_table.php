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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->integer('ISBN')->numberBetween(1000000, 9999999);
            $table->text('name');
            $table->string('cover');
            $table->foreignId('author_id');
            $table->integer('number_of_pages');
            $table->foreignId('genre_id');
            $table->integer('publication_year');
            $table->text('excerpt');
            $table->integer('number_of_rates');
            $table->float('rate');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
