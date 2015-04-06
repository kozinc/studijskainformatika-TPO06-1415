<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentProgramTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('student_program', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_studenta')->unsigned();
            $table->integer('id_programa')->unsigned();
            $table->integer('vrsta_vpisa');
            $table->string('nacin_studija');
            $table->date('vloga_oddana')->nullable();
            $table->date('vloga_potrjena')->nullable();
            $table->integer('prosta_izbira');
            $table->date('datum_vpisa')->nullable();;
            $table->string('studijsko_leto');
            $table->integer('letnik');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student_program');
    }

}
