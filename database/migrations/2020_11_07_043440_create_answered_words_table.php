<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnsweredWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answered_words', function (Blueprint $table) {
            $table->id();
            $table->string('answer', 128);
            $table->foreignId('list_id');
            $table->foreign('list_id')->references('id')->on('list_exercises');
            $table->foreignId('word_id');
            $table->foreign('word_id')->references('id')->on('words');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('answered_words');
    }
}
