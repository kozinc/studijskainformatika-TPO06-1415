<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $this->call('StudentTableSeeder');
		Model::unguard();

	}


}

class StudentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('student')->delete();

        App\Models\Student::create(['vpisna' => '63120340', 'ime' => 'Neza', 'priimek' => 'Belej', 'email' => 'nezabelej@gmail.com','geslo' => 'nezabelej', 'emso' => 'EmsoOdNeze', 'posta' => '3270', 'datum_rojstva'=>'1992-08-12', 'obcina_rojstva' => 'Trbovlje']);

    }

}
