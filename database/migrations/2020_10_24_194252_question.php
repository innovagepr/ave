<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Question extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paragraph_id');
            $table->foreign('paragraph_id')->references('id')->on('paragraph');
            $table->foreignId('list_id');
            $table->foreign('list_id')->references('id')->on('list_exercise');
            $table->foreignId('difficulty_id');
            $table->foreign('difficulty_id')->references('id')->on('difficulty');
            $table->string('question', 128);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question');
    }
}
