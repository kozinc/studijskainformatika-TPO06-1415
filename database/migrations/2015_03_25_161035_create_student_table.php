<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()

	{
        Schema::create('student', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('vpisna');
            $table->string('ime');
            $table->string('priimek');
            $table->string('spol');
            $table->string('telefon');
            $table->string('email');
            $table->string('geslo');
            $table->string('emso');
            $table->string('kraj');
            $table->integer('posta');
            $table->string('drzava');
            $table->date('datum_rojstva');
            $table->string('obcina_rojstva');
            $table->string('drzava_rojstva');
            $table->string('davcna');
            $table->string('drzavljanstvo');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        Schema::drop('student');

	}

}
