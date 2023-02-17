<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->integer('book_id');
            $table->integer('goodreads_book_id');
            $table->integer('best_book_id');
            $table->integer('work_id');
            $table->integer('books_count');
            $table->string('isbn');
            $table->string('isbn13');
            $table->string('authors');
            $table->string('original_publication_year');
            $table->string('original_title');
            $table->string('title');
            $table->string('language_code');
            $table->string('average_rating');
            $table->string('ratings_count');
            $table->string('work_ratings_count');
            $table->string('work_text_reviews_count');
            $table->string('ratings_1');
            $table->string('ratings_2');
            $table->string('ratings_3');
            $table->string('ratings_4');
            $table->string('ratings_5');
            $table->string('image_url');
            $table->string('small_image_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
