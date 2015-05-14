<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

include 'StudentSeeder.php';
include 'IzpitniRokSeeder.php';
include 'NosilecSeeder.php';
include 'OrganSeeder.php';
include 'PredmetSeeder.php';
include 'ProgramLetnikSeeder.php';
include 'ReferentSeeder.php';
include 'ProgramPredmetSeeder.php';
include 'SklepSeeder.php';
include 'StudentIzpitSeeder.php';
include 'StudentPredmetSeeder.php';
include 'StudentProgramSeeder.php';
include 'StudijskiProgramSeeder.php';
include 'VrstaVpisaSeeder.php';
include 'ModulSeeder.php';


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call('StudentSeeder');
        $this->call('IzpitniRokSeeder');
        $this->call('ModulSeeder');
        $this->call('NosilecSeeder');
        $this->call('OrganSeeder');
        $this->call('PredmetSeeder');
        $this->call('ProgramPredmetSeeder');
        $this->call('ProgramLetnikSeeder');
        $this->call('ReferentSeeder');
        $this->call('SklepSeeder');
        $this->call('StudentIzpitSeeder');
        $this->call('StudentPredmetSeeder');
        $this->call('StudentProgramSeeder');
        $this->call('StudijskiProgramSeeder');
        $this->call('VrstaVpisaSeeder');
        $this->call('PredmetNosilecSeeder');

		Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

	}

}

