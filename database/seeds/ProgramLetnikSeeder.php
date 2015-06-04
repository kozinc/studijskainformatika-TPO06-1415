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
        ProgramLetnik::create(['id_programa'=>1, 'letnik'=>1, 'KT'=>60,'stevilo_obveznih_predmetov'=>60, 'stevilo_strokovnih_predmetov'=>0,'stevilo_prostih_predmetov'=>0, 'stevilo_modulov'=>0, 'stevilo_kt_modulskih'=>0]);
        ProgramLetnik::create(['id_programa'=>1, 'letnik'=>2 ,'KT'=>60,'stevilo_obveznih_predmetov'=>48, 'stevilo_strokovnih_predmetov'=>6,'stevilo_prostih_predmetov'=>6, 'stevilo_modulov'=>0, 'stevilo_kt_modulskih'=>0]);
        ProgramLetnik::create(['id_programa'=>1, 'letnik'=>3, 'KT'=>60,'stevilo_obveznih_predmetov'=>18, 'stevilo_strokovnih_predmetov'=>0,'stevilo_prostih_predmetov'=>6, 'stevilo_modulov'=>2, 'stevilo_kt_modulskih'=>36]);
        ProgramLetnik::create(['id_programa'=>3, 'letnik'=>1, 'KT'=>60,'stevilo_obveznih_predmetov'=>24, 'stevilo_strokovnih_predmetov'=>24,'stevilo_prostih_predmetov'=>12, 'stevilo_modulov'=>0, 'stevilo_kt_modulskih'=>0]);
        ProgramLetnik::create(['id_programa'=>3, 'letnik'=>2, 'KT'=>60,'stevilo_obveznih_predmetov'=>24, 'stevilo_strokovnih_predmetov'=>36,'stevilo_prostih_predmetov'=>0, 'stevilo_modulov'=>0, 'stevilo_kt_modulskih'=>0]);

    }
}