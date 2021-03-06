<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->enum('name',array_keys(\App\Models\Painel\ClassInformation::CLASS_TYPES));
            $table->integer('semester');
            $table->integer('year');
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
        Schema::dropIfExists('class_informations');
    }
}
