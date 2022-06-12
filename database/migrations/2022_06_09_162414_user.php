<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create schema for user table
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('username')->unique();
            $table->string('password')->bcrypt();
            $table->string('name');
            // jenis kelamin
            $table->string('gender');
            $table->string('location');
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
        //drop schema
        Schema::dropIfExists('users');
    }
}
