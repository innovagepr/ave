<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetAvatarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_avatars', function (Blueprint $table) {
            $table->id();
            $table->foreignId("pet_id");
            $table->foreign("pet_id")->references('id')->on('pets');
            $table->foreignId("reward_type_id");
            $table->foreign('reward_type_id')->references('id')->on('reward_types');
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
        Schema::dropIfExists('pet_avatars');
    }
}
