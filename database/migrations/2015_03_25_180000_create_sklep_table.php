<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSklepTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sklep', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('id_studenta');
            $table->integer('id_organa');
            $table->date('datum_izdaje');
            $table->date('datum_veljavnosti')->nullable()->default(null);
            $table->text('vsebina');
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
        Schema::dropIfExists('sklep');
    }

}
