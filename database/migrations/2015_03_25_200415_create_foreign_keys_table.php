<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('student_predmet', function($table) {
            $table->foreign('id_studenta')->references('id')->on('student');
            $table->foreign('id_predmeta')->references('id')->on('predmet');
        });

        Schema::table('student_program', function($table) {
            $table->foreign('id_studenta')->references('id')->on('student');
            $table->foreign('id_programa')->references('id')->on('studijski_program');
        });

        Schema::table('program_modul', function($table) {
            $table->foreign('id_modula')->references('id')->on('modul');
            $table->foreign('id_programa')->references('id')->on('studijski_program');
        });

        Schema::table('program_predmet', function($table) {
            $table->foreign('id_programa')->references('id')->on('studijski_program');
            $table->foreign('id_predmeta')->references('id')->on('predmet');
        });

        Schema::table('predmet', function($table) {
            $table->foreign('id_nosilca')->references('id')->on('nosilec');
            $table->foreign('id_modula')->references('id')->on('modul');
        });

        Schema::table('izpitni_rok', function($table) {
            $table->foreign('id_predmeta')->references('id')->on('predmet');
        });

        Schema::table('student_izpit', function($table) {
            $table->foreign('id_studenta')->references('id')->on('student');
            $table->foreign('id_izpitnega_roka')->references('id')->on('izpitni_rok');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
