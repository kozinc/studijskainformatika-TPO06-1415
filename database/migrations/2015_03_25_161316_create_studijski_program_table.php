<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudijskiProgramTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('studijski_program', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('ime');
            $table->string('oznaka');
            $table->text('opis');
            $table->integer('stopnja');
            $table->integer('trajanje_leta');
            $table->integer('stevilo_semestrov');
            $table->integer('KT');
            $table->integer('klasius_srv');
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
        Schema::drop('studijski_program');
	}

}
