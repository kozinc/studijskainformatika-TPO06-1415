<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeIdNosilcaInPredmetTable extends Migration {

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
            // in dodal kolumne za nosilca 1, 2 in 3. Minimalno je 1 nosilec, maximalno 3 nosilci
            $table->foreign('id_nosilca')->references('id')->on('nosilec')->unsigned();
            $table->foreign('id_nosilca2')->references('id')->on('nosilec')->nullable()->unsigned();
            $table->foreign('id_nosilca2')->references('id')->on('nosilec')->nullable()->unsigned();
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
