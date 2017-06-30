<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_date', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('assigned')->default(false);

            $table->integer('ad_id')->unsigned()->nullable();
            $table->foreign('ad_id')->references('id')
                ->on('ads')->onDelete('cascade');

            $table->integer('date_id')->unsigned()->nullable();
            $table->foreign('date_id')->references('id')
                ->on('dates')->onDelete('cascade');

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
        Schema::dropIfExists('ad_date');
    }
}
