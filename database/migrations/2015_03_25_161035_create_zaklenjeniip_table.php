<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZaklenjeniipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()

	{
        Schema::create('zaklenjeni_ip', function(Blueprint $table) {
            $table->increments('id');
            $table->string('ip');
            $table->dateTime('datum_odklenitve');
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
