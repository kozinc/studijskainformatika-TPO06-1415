<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('referent', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('uporabnisko_ime');
            $table->string('geslo');
            $table->string('email');
            $table->string('ime');
            $table->string('priimek');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('referent');
    }

}
