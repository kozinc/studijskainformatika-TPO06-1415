<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramLetnik extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_letnik', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_programa');
            $table->integer('letnik');
            $table->integer('KT');
            $table->integer('stevilo_obveznih_predmetov')->unsigned();
            $table->integer('stevilo_strokovnih_predmetov')->unsigned();
            $table->integer('stevilo_prostih_predmetov')->unsigned();
            $table->integer('stevilo_modulov')->unsigned();
            $table->integer('stevilo_kt_modulskih')->unsigned();
            $table->integer('KT_za_napredovanje')->unsigned();
            $table->integer('KT_za_ponavljanje')->unsigned();
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
        Schema::drop('program_letnik');
    }

}
