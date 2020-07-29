<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IncreaseFieldsSize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            //
            $table->string('title', 200)->change();;

        });

        Schema::table('book_sections', function (Blueprint $table) {
            //
            $table->string('title', 200)->change();;
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            //
            $table->string('title', 100)->change();;

        });

        Schema::table('book_sections', function (Blueprint $table) {
            //
            $table->string('title', 100)->change();;
            
        });
    }
}
