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
            $table->string('email');
            $table->string('geslo');
            $table->string('emso');
            $table->integer('posta');
            $table->date('datum_rojstva');
            $table->string('obcina_rojstva');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('student');
	}

}
