<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table)
        {
            $table->charset = 'UTF8';
            $table->bigIncrements('id');
            $table->string('name', 128);
            $table->string('short_description', 100);
            $table->text('description')->nullable();
            $table->string('author',128);
            $table->integer('theme_id')->nullable();
            $table->integer('subject_id');
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
        Schema::dropIfExists('tasks');
    }
}