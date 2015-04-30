<?php
/**
 * Created by PhpStorm.
 * User: Neza
 * Date: 27.4.2015
 * Time: 21:30
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Referent;


class ReferentSeeder extends Seeder
{

    public function run()
    {
        DB::table('referent')->truncate();
        Referent::create(['email'=>'zdenka.velikonja@fri.uni-lj.si', 'geslo'=>Hash::make('zdenkavelikonja'), 'ime'=>'Zdenka','priimek'=>'Velikonja']);
        Referent::create(['email'=>'metka.runovc@fri.uni-lj.si', 'geslo'=>Hash::make('metkarunovc'), 'ime'=>'Metka','priimek'=>'Runovc']);

    }
}