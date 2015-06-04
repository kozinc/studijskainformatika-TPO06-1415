<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
{
    Schema::create('modul', function(Blueprint $table)
    {
        $table->increments('id');
        $table->integer('id_programa')->unsigned();
        $table->string('ime');
        $table->text('opis')->nullable();
        $table->integer('letnik')->unsigned();
        $table->string('studijsko_leto');
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
        Schema::drop('modul');
    }

}
