<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassChoosingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_choosings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_choice_id')->unsigned();
            $table->foreign('type_choice_id')->references('id')->on('type_choices');
            $table->integer('list_choice_id')->unsigned();
            $table->foreign('list_choice_id')->references('id')->on('list_choices');
            $table->unique(['list_choice_id','type_choice_id'],'class_choosing_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_choosings');
    }
}
