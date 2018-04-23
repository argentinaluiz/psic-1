<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionChoiceTypeChoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_choice_type_choice', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_choice_id')->unsigned()->unique();
            $table->foreign('type_choice_id')->references('id')->on('type_choices');
            $table->integer('question_choice_id')->unsigned()->unique();
            $table->foreign('question_choice_id')->references('id')->on('question_choices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_choice_type_choice');
    }
}
