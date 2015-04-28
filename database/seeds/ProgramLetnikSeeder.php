<?php
/**
 * Created by PhpStorm.
 * User: Neza
 * Date: 27.4.2015
 * Time: 21:17
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProgramLetnik;


class ProgramLetnikSeeder extends Seeder
{

    public function run()
    {
        DB::table('program_letnik')->truncate();
        ProgramLetnik::create(['id_programa'=>1, 'letnik'=>1, 'KT'=>60,'stevilo_obveznih_predmetov'=>10, 'stevilo_strokovnih_predmetov'=>0,'stevilo_prostih_predmetov'=>0, 'stevilo_modulov'=>0]);
        ProgramLetnik::create(['id_programa'=>1, 'letnik'=>2 ,'KT'=>60,'stevilo_obveznih_predmetov'=>8, 'stevilo_strokovnih_predmetov'=>1,'stevilo_prostih_predmetov'=>1, 'stevilo_modulov'=>0]);
        ProgramLetnik::create(['id_programa'=>1, 'letnik'=>3, 'KT'=>60,'stevilo_obveznih_predmetov'=>3, 'stevilo_strokovnih_predmetov'=>0,'stevilo_prostih_predmetov'=>1, 'stevilo_modulov'=>2]);
        ProgramLetnik::create(['id_programa'=>3, 'letnik'=>1, 'KT'=>60,'stevilo_obveznih_predmetov'=>4, 'stevilo_strokovnih_predmetov'=>5,'stevilo_prostih_predmetov'=>2, 'stevilo_modulov'=>0]);
        ProgramLetnik::create(['id_programa'=>3, 'letnik'=>2, 'KT'=>60,'stevilo_obveznih_predmetov'=>1, 'stevilo_strokovnih_predmetov'=>6,'stevilo_prostih_predmetov'=>0, 'stevilo_modulov'=>0]);

    }
}