<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Todos extends Migration
{
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')-> nullable(false);
            $table->text('desc');
            $table->timestamp('datestart')-> nullable(false);
            $table->timestamp('dateend')-> nullable(false);
            $table->timestamp('dateupdate')-> nullable(false);
            $table->integer('priority')-> nullable(true)->default(2);
            $table->integer('status')-> nullable(false) ->default(1);
            $table->integer('employeeid')->unsigned()->nullable();
            $table->foreign('employeeid')->references('id')->on('users');
            $table->integer('creatorid')->unsigned()->nullable();
            $table->foreign('creatorid')->references('id')->on('users');
        });
    }
    public function down()
    {
        Schema::drop('todos');
    }
}
