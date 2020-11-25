<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_exercises', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->foreignId('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('difficulty_id');
            $table->foreign('difficulty_id')->references('id')->on('difficulties');
            $table->boolean('active');
            $table->boolean('deleted');
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
        Schema::dropIfExists('list_exercises');
    }
}
