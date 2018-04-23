<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->string('name');
            $table->enum('question_type',array_keys(\App\Models\Painel\ClassTest::QUESTION_TYPE));
            $table->integer('class_meeting_id')->unsigned();
            $table->foreign('class_meeting_id')->references('id')->on('class_meetings');
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
        Schema::dropIfExists('class_tests');
    }
}
