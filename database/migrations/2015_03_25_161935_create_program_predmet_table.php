<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramPredmetTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_predmet', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_programa')->unsigned();
            $table->integer('id_nosilca1')->unsigned();;
            $table->integer('id_nosilca2')->unsigned();;
            $table->integer('id_nosilca3')->unsigned();;
            $table->string('studijsko_leto');
            $table->integer('id_predmeta')->unsigned();
            $table->integer('letnik');
            $table->integer('semester')->unsigned();
            $table->string('tip');
            $table->integer('id_modula')->unsigned()->nullable();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('program_predmet');
    }

}
