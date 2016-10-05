<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ap');
            $table->string('am');
            $table->string('username')->unique();
            $table->string('cel', 8);
            $table->string('ci');
            $table->dateTime('birthday');
            $table->enum('role', ['user', 'editor', 'admin']);
            $table->boolean('active')->default(true);

            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('registration_token')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
