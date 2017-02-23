<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditionSectionNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edition_section_name', function (Blueprint $table){
           $table->increments('id');

            $table->integer('section_name_id')->unsigned();
            $table->foreign('section_name_id')->references('id')->on('section_names')->onDelete('cascade');

            $table->integer('edition_id')->unsigned();
            $table->foreign('edition_id')->references('id')->on('editions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('edition_section_name');
    }
}
