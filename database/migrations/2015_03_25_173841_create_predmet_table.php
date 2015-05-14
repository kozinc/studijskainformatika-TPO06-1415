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
            /*deprecated, to slowly put out of use*/
            $table->integer('id_nosilca')->unsigned();
            $table->integer('id_nosilca2')->unsigned();
            $table->integer('id_nosilca3')->unsigned();
            /**/
            $table->integer('KT');
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
