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
            $table->string('vrsta_vpisa');
            $table->string('nacin_studija');
            $table->date('datum_vpisa');
            $table->string('studijsko_leto');
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
