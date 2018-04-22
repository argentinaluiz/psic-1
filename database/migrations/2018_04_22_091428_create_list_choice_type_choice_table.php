<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListChoiceTypeChoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_choice_type_choice', function (Blueprint $table) {
            $table->integer('type_choice_id')->unsigned();
            $table->foreign('type_choice_id')->references('id')->on('type_choices');

            $table->integer('list_choice_id')->unsigned();
            $table->foreign('list_choice_id')->references('id')->on('list_choices');

            $table->unique(['type_choice_id','list_choice_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_choice_type_choice');
    }
}
