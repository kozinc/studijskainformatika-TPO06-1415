<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeIdNosilcaToLinkInPredmetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('predmet', function(Blueprint $table)
		{
			//tukaj sem zbrisal columno id_nosilca
            $table->dropColumn('id_nosilca');
            // in dodal kolumno za povazovalno tabelo
            $table->foreign('id_link')->references('id')->on('link_predmet_nosilci');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('predmet', function(Blueprint $table)
		{
			//
		});
	}

}
