<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

include __DIR__.'\StudentSeeder.php';
include __DIR__.'\IzpitniRokSeeder.php';
include __DIR__.'\NosilecSeeder.php';
include __DIR__.'\OrganSeeder.php';
include __DIR__.'\PredmetSeeder.php';
include __DIR__.'\ProgramLetnikSeeder.php';
include __DIR__.'\ReferentSeeder.php';
include __DIR__.'\ProgramPredmetSeeder.php';
include __DIR__.'\SklepSeeder.php';
include __DIR__.'\StudentIzpitSeeder.php';
include __DIR__.'\StudentPredmetSeeder.php';
include __DIR__.'\StudentProgramSeeder.php';
include __DIR__.'\StudijskiProgramSeeder.php';
include __DIR__.'\VrstaVpisaSeeder.php';
include __DIR__.'\ModulSeeder.php';


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

