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

        App\Models\Student::create(['vpisna' => '63120340', 'ime' => 'Neza', 'priimek' => 'Belej', 'email' => 'nezabelej@gmail.com','geslo' => 'nezabelej', 'emso' => 'EmsoOdNeze', 'posta' => '3270', 'datum_rojstva'=>'1992-12-08', 'obcina_rojstva' => 'Trbovlje']);
        App\Models\Student::create(['vpisna' => '63120136', 'ime' => 'Veronika', 'priimek' => 'Blažič', 'email' => 'veronikablazic@gmail.com','geslo' => 'veronikablazic', 'emso' => 'EmsoOdVeroni', 'posta' => '5000', 'datum_rojstva' => '1993-09-23', 'obcina_rojstva' => 'Nova Gorica']);
        App\Models\Student::create(['vpisna' => '63130385', 'ime' => 'Nejc', 'priimek' => 'Bizjak', 'email' => 'necobizjak@gmail.com','geslo' => 'nejcbizjak', 'emso' => 'EmsoOdNejca', 'posta' => '5272', 'datum_rojstva' => '1991-07-13', 'obcina_rojstva' => 'Nova Gorica']);


    }

}
