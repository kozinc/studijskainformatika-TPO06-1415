<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

include 'database\seeds\StudentSeeder.php';
include 'database\seeds\IzpitniRokSeeder.php';
include 'database\seeds\NosilecSeeder.php';
include 'database\seeds\OrganSeeder.php';
include 'database\seeds\PredmetSeeder.php';
include 'database\seeds\ProgramLetnikSeeder.php';
include 'database\seeds\ReferentSeeder.php';
include 'database\seeds\ProgramPredmetSeeder.php';
include 'database\seeds\SklepSeeder.php';
include 'database\seeds\StudentIzpitSeeder.php';
include 'database\seeds\StudentPredmetSeeder.php';
include 'database\seeds\StudentProgramSeeder.php';
include 'database\seeds\StudijskiProgramSeeder.php';
include 'database\seeds\VrstaVpisaSeeder.php';
include 'database\seeds\ModulSeeder.php';


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
		Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

	}

}

