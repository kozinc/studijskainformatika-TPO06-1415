<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramModulTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('program_modul', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_programa')->unsigned();
            $table->integer('id_modula')->unsigned();


        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('program_modul');
    }

}
