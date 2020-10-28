<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paragraph_id');
            $table->foreign('paragraph_id')->references('id')->on('paragraphs');
            $table->foreignId('list_id');
            $table->foreign('list_id')->references('id')->on('list_exercises');
            $table->foreignId('difficulty_id');
            $table->foreign('difficulty_id')->references('id')->on('difficulties');
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
        Schema::dropIfExists('questions');
    }
}
