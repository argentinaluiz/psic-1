<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->integer('class_information_id')->unsigned();
            $table->foreign('class_information_id')->references('id')->on('class_informations');
            $table->integer('psychoanalyst_id')->unsigned();
            $table->foreign('psychoanalyst_id')->references('id')->on('psychoanalysts');
            $table->unique(['subject_id','class_information_id','psychoanalyst_id'],'class_meeting_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_meetings');
    }
}
