<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->longText('note')->nullable();

            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->integer('reporter_id')->unsigned();
            $table->foreign('reporter_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->integer('status');

            $table->string('image')->nullable();

            $table->boolean('photo')->default(false);
            $table->boolean('titular')->default(false);
            $table->boolean('discarded')->default(false);

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
        Schema::dropIfExists('notes');
    }
}
