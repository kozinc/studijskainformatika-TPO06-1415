<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredmetNosilecsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('predmet_nosilec', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('id_predmeta')->unsigned();

            $table->integer('id_nosilca')->unsigned();
            $table->integer('id_nosilca2')->unsigned();
            $table->integer('id_nosilca3')->unsigned();

            $table->string('studijsko_leto');

            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('predmet_nosilec');
	}

}
