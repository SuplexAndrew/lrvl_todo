<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname')-> nullable(false);
            $table->string('lastname')-> nullable(false);
            $table->string('patronymic')-> nullable(false);
            $table->string('login')-> nullable(false);
            $table->string('password')-> nullable(false);
            $table->string('salt')-> nullable(false);
            $table->integer('leaderid');
        });
    }

    public function down()
    {
        Schema::drop('users');
    }
}
