<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredmetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('predmet', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('sifra');
            $table->string('naziv');
            $table->text('opis');
            $table->integer('id_nosilca')->unsigned();
            $table->integer('KT');
            $table->integer('id_modula')->unsigned();
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
        Schema::drop('predmet');
    }

}
