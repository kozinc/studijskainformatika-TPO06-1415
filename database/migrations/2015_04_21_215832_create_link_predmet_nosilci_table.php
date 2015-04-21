<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkPredmetNosilciTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('link_predmet_nosilci', function(Blueprint $table)
		{
			$table->increments('id');
            $table->foreign('id_predmeta')->references('id')->on('predmet')->unsigned();
            $table->foreign('id_nosilca1')->references('id')->on('nosilec')->unsigned();
            $table->foreign('id_nosilca2')->references('id')->on('nosilec')->nullable()->unsigned();
            $table->foreign('id_nosilca2')->references('id')->on('nosilec')->nullable()->unsigned();
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
		Schema::drop('link_predmet_nosilci');
	}

}
