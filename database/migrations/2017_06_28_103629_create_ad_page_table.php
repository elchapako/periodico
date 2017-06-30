<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdPageTable extends Migration
{
    public function up()
    {
        Schema::create('ad_page', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('ad_id')->unsigned()->nullable();
            $table->foreign('ad_id')->references('id')
                ->on('ads')->onDelete('cascade');

            $table->integer('page_id')->unsigned()->nullable();
            $table->foreign('page_id')->references('id')
                ->on('pages')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ad_page');
    }
}
