<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentIzpitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('student_izpit', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_studenta')->unsigned();
            $table->integer('id_izpitnega_roka')->unsigned();
            $table->integer('tocke_izpita');
            $table->integer('ocena');
            $table->date('datum_vnosa_ocene');
            $table->date('datum_prijave')->nullable();
            $table->date('datum_odjave')->nullable();
            $table->integer('vrnjena_prijava');
            $table->integer('placilo_izpita')->nullable();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student_izpit');
    }

}
