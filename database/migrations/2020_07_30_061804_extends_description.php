<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtendsDescription extends Migration
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
            $table->longText('description', 200)->change();

        });

        Schema::table('book_sections', function (Blueprint $table) {
            //
            $table->longText('description', 200)->change();
            
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
            $table->text('description', 200)->change();

        });

        Schema::table('book_sections', function (Blueprint $table) {
            //
            $table->text('description', 200)->change();
            
        });
    }
}
