<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelTables extends Migration
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
            $table->string('title', 100)->unique();
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('book_sections', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bookid')->unsigned();;
            $table->bigInteger('parentid')->unsigned();;
            $table->string('title', 100);
            $table->text('description');
            $table->integer('position');
            $table->string('type');//chapter or content
            $table->timestamps();
            
            $table->foreign('bookid')->references('id')->on('books');
            $table->foreign('parentid')->references('id')->on('book_sections');
        });

        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->unique();
        });

        Schema::create('books_authors', function (Blueprint $table) {
            $table->bigInteger('bookid')->unsigned();
            $table->bigInteger('authorid')->unsigned();
            $table->primary(['bookid', 'authorid']);

            $table->foreign('bookid', 'fk_books')->references('id')->on('books');
            $table->foreign('authorid', 'fk_authors')->references('id')->on('authors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_authors');
        Schema::dropIfExists('book_sections');
        Schema::dropIfExists('books');
        Schema::dropIfExists('authors');
        
    }
}
