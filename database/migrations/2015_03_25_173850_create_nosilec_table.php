<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNosilecTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('nosilec', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('ime');
            $table->string('priimek');
            $table->string('vloga');
            $table->string('email');
            $table->string('geslo');
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
        Schema::drop('nosilec');
    }

}
