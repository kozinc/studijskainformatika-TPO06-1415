<?php

use Illuminate\Database\Migrations\Migration;

class DeleteEverything extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        Schema::dropIfExists('izpitni_rok');
        Schema::dropIfExists('modul');
        Schema::dropIfExists('nosilec');
        Schema::dropIfExists('predmet');
        Schema::dropIfExists('predmet_nosilec');
        Schema::dropIfExists('program_letnik');
        Schema::dropIfExists('program_modul');
        Schema::dropIfExists('program_predmet');
        Schema::dropIfExists('referent');
        Schema::dropIfExists('student');
        Schema::dropIfExists('student_izpit');
        Schema::dropIfExists('student_predmet');
        Schema::dropIfExists('student_program');
        Schema::dropIfExists('studijski_program');
        Schema::dropIfExists('vrsta_vpisa');
        Schema::dropIfExists('zaklenjeni_ip');
        Schema::dropIfExists('sklep');
        Schema::dropIfExists('organ');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        Schema::dropIfExists('migrations');
        Schema::dropIfExists('izpitni_rok');
        Schema::dropIfExists('modul');
        Schema::dropIfExists('nosilec');
        Schema::dropIfExists('predmet');
        Schema::dropIfExists('predmet_nosilec');
        Schema::dropIfExists('program_letnik');
        Schema::dropIfExists('program_modul');
        Schema::dropIfExists('program_predmet');
        Schema::dropIfExists('referent');
        Schema::dropIfExists('student');
        Schema::dropIfExists('student_izpit');
        Schema::dropIfExists('student_predmet');
        Schema::dropIfExists('student_program');
        Schema::dropIfExists('studijski_program');
        Schema::dropIfExists('vrsta_vpisa');
        Schema::dropIfExists('zaklenjeni_ip');
        Schema::dropIfExists('sklep');
        Schema::dropIfExists('organ');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

    }
}