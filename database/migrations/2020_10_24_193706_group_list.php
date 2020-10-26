<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GroupList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_list', function (Blueprint $table) {
            $table->foreignId('group_id');
            $table->foreign('group_id')->references('id')->on('group');
            $table->foreignId('list_id');
            $table->foreign('list_id')->references('id')->on('list_exercise');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_list');
    }
}
