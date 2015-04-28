<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIzpitniRokTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('izpitni_rok', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_predmeta')->unsigned();
            $table->integer('izpitni_rok');
            $table->date('datum');
            $table->string('studijsko_leto');
            $table->string('predavalnice');
            $table->time('ura_izpita');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('izpitni_rok');
    }

}
