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
            $table->integer('ocena');
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
