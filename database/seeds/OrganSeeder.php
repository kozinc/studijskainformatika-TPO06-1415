<?php
/**
 * Created by PhpStorm.
 * User: Neza
 * Date: 27.4.2015
 * Time: 21:30
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organ;


class OrganSeeder extends Seeder
{

    public function run()
    {
        DB::table('organ')->truncate();
        DB::table('organ')->insert(['ime'=> 'Dekan']);
        DB::table('organ')->insert(['ime'=> 'Senat']);
        DB::table('organ')->insert(['ime'=> 'Akademski zbor']);
        DB::table('organ')->insert(['ime'=> 'Upravni odbor']);
        DB::table('organ')->insert(['ime'=> 'Študentski svet']);

    }
}