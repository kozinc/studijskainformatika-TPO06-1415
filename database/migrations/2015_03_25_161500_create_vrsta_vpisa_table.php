<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVrstaVpisaTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vrsta_vpisa', function(Blueprint $table)
        {
            $table->integer('sifra')->primary('sifra');
            $table->string('ime');
            $table->string('mozni_letniki');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vrsta_vpisa');
    }
}