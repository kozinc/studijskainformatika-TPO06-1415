<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentPredmetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('student_predmet', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_studenta')->unsigned();
            $table->integer('id_predmeta')->unsigned();
            $table->integer('letnik');
            $table->integer('semester');
            $table->string('studijsko_leto');
            $table->integer('ocena');
            $table->integer('tocke_izpita');
            $table->timestamps();
            $table->softDeletes();
        });


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('student_predmet');
	}

}
