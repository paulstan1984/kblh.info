<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->unique();
        });

        Schema::create('books_categories', function (Blueprint $table) {
            $table->bigInteger('bookid')->unsigned();
            $table->bigInteger('categoryid')->unsigned();
            $table->primary(['bookid', 'categoryid']);

            $table->foreign('bookid')->references('id')->on('books');
            $table->foreign('categoryid')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('books_categories');
    }
}
