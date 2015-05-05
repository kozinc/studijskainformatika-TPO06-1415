<?php
/**
 * Created by PhpStorm.
 * User: Neza
 * Date: 27.4.2015
 * Time: 21:09
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\IzpitniRok;

class IzpitniRokSeeder extends Seeder
{

    public function run()
    {

        DB::table('izpitni_rok')->truncate();
        //2012/2013 1.letnik BUN-RI
        IzpitniRok::create(['id_predmeta'=>1, 'izpitni_rok'=>1, 'datum'=>'2013-01-21', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>1, 'izpitni_rok'=>2, 'datum'=>'2013-02-05', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>1, 'izpitni_rok'=>3, 'datum'=>'2013-09-08', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>2, 'izpitni_rok'=>1, 'datum'=>'2013-02-01', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>2, 'izpitni_rok'=>2, 'datum'=>'2013-02-18', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>2, 'izpitni_rok'=>3, 'datum'=>'2013-09-04', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>3, 'izpitni_rok'=>1, 'datum'=>'2013-01-16', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>3, 'izpitni_rok'=>2, 'datum'=>'2013-02-04', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>3, 'izpitni_rok'=>3, 'datum'=>'2013-09-06', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>4, 'izpitni_rok'=>1, 'datum'=>'2013-01-19', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>4, 'izpitni_rok'=>2, 'datum'=>'2013-02-07', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>4, 'izpitni_rok'=>3, 'datum'=>'2013-09-09', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>5, 'izpitni_rok'=>1, 'datum'=>'2013-01-10', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>5, 'izpitni_rok'=>2, 'datum'=>'2013-02-12', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>5, 'izpitni_rok'=>3, 'datum'=>'2013-09-19', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>6, 'izpitni_rok'=>1, 'datum'=>'2013-06-19', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>6, 'izpitni_rok'=>2, 'datum'=>'2013-06-30', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>6, 'izpitni_rok'=>3, 'datum'=>'2013-09-06', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>7, 'izpitni_rok'=>1, 'datum'=>'2013-06-24', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>7, 'izpitni_rok'=>2, 'datum'=>'2013-07-04', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>7, 'izpitni_rok'=>3, 'datum'=>'2013-09-23', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>8, 'izpitni_rok'=>1, 'datum'=>'2013-06-09', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>8, 'izpitni_rok'=>2, 'datum'=>'2013-06-22', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>8, 'izpitni_rok'=>3, 'datum'=>'2013-09-20', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>9, 'izpitni_rok'=>1, 'datum'=>'2013-06-25', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>9, 'izpitni_rok'=>2, 'datum'=>'2013-06-29', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>9, 'izpitni_rok'=>3, 'datum'=>'2013-08-31', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>10, 'izpitni_rok'=>1, 'datum'=>'2013-01-17', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>10, 'izpitni_rok'=>2, 'datum'=>'2013-02-09', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>10, 'izpitni_rok'=>3, 'datum'=>'2013-09-07', 'studijsko_leto'=>'2012/2013', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);

        //2013/2014 2.letnik BUN-RI
        IzpitniRok::create(['id_predmeta'=>11, 'izpitni_rok'=>1, 'datum'=>'2014-01-21', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>11, 'izpitni_rok'=>2, 'datum'=>'2014-02-05', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>11, 'izpitni_rok'=>3, 'datum'=>'2014-09-08', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>12, 'izpitni_rok'=>1, 'datum'=>'2014-02-01', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>12, 'izpitni_rok'=>2, 'datum'=>'2014-02-18', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>12, 'izpitni_rok'=>3, 'datum'=>'2014-09-04', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>13, 'izpitni_rok'=>1, 'datum'=>'2014-01-16', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>13, 'izpitni_rok'=>2, 'datum'=>'2014-02-04', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>13, 'izpitni_rok'=>3, 'datum'=>'2014-09-06', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>14, 'izpitni_rok'=>1, 'datum'=>'2014-01-19', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>14, 'izpitni_rok'=>2, 'datum'=>'2014-02-07', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>14, 'izpitni_rok'=>3, 'datum'=>'2014-09-09', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>15, 'izpitni_rok'=>1, 'datum'=>'2014-01-10', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>15, 'izpitni_rok'=>2, 'datum'=>'2014-02-12', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>15, 'izpitni_rok'=>3, 'datum'=>'2014-09-19', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>16, 'izpitni_rok'=>1, 'datum'=>'2014-06-19', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>16, 'izpitni_rok'=>2, 'datum'=>'2014-06-30', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>16, 'izpitni_rok'=>3, 'datum'=>'2014-09-06', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>17, 'izpitni_rok'=>1, 'datum'=>'2014-06-24', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>17, 'izpitni_rok'=>2, 'datum'=>'2014-07-04', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>17, 'izpitni_rok'=>3, 'datum'=>'2014-09-23', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>18, 'izpitni_rok'=>1, 'datum'=>'2014-06-09', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>18, 'izpitni_rok'=>2, 'datum'=>'2014-06-22', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>18, 'izpitni_rok'=>3, 'datum'=>'2014-09-20', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>19, 'izpitni_rok'=>1, 'datum'=>'2014-06-25', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>19, 'izpitni_rok'=>2, 'datum'=>'2014-06-29', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>19, 'izpitni_rok'=>3, 'datum'=>'2014-08-31', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);


        //2014/2015 3.letnik BUN-RI
        IzpitniRok::create(['id_predmeta'=>20, 'izpitni_rok'=>1, 'datum'=>'2015-01-21', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>20, 'izpitni_rok'=>2, 'datum'=>'2015-02-05', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>20, 'izpitni_rok'=>3, 'datum'=>'2015-09-08', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>21, 'izpitni_rok'=>1, 'datum'=>'2015-02-01', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>21, 'izpitni_rok'=>2, 'datum'=>'2015-02-18', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>21, 'izpitni_rok'=>3, 'datum'=>'2015-09-04', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>22, 'izpitni_rok'=>1, 'datum'=>'2015-01-16', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>22, 'izpitni_rok'=>2, 'datum'=>'2015-02-04', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>22, 'izpitni_rok'=>3, 'datum'=>'2015-09-06', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>23, 'izpitni_rok'=>1, 'datum'=>'2015-01-19', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>23, 'izpitni_rok'=>2, 'datum'=>'2015-02-07', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>23, 'izpitni_rok'=>3, 'datum'=>'2015-09-09', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>24, 'izpitni_rok'=>1, 'datum'=>'2015-04-26', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>24, 'izpitni_rok'=>2, 'datum'=>'2015-06-11', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>24, 'izpitni_rok'=>3, 'datum'=>'2015-09-19', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>25, 'izpitni_rok'=>1, 'datum'=>'2015-06-19', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>25, 'izpitni_rok'=>2, 'datum'=>'2015-06-30', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>25, 'izpitni_rok'=>3, 'datum'=>'2015-09-06', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>26, 'izpitni_rok'=>1, 'datum'=>'2015-06-24', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>26, 'izpitni_rok'=>2, 'datum'=>'2015-07-04', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>26, 'izpitni_rok'=>3, 'datum'=>'2015-09-23', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>27, 'izpitni_rok'=>1, 'datum'=>'2015-06-09', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>27, 'izpitni_rok'=>2, 'datum'=>'2015-06-22', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>27, 'izpitni_rok'=>3, 'datum'=>'2015-09-20', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);


        //2013/2014 1.letnik BUN-RI
        IzpitniRok::create(['id_predmeta'=>1, 'izpitni_rok'=>1, 'datum'=>'2014-01-21', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>1, 'izpitni_rok'=>2, 'datum'=>'2014-02-05', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>1, 'izpitni_rok'=>3, 'datum'=>'2014-09-08', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>2, 'izpitni_rok'=>1, 'datum'=>'2014-02-01', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>2, 'izpitni_rok'=>2, 'datum'=>'2014-02-18', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>2, 'izpitni_rok'=>3, 'datum'=>'2014-09-04', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>3, 'izpitni_rok'=>1, 'datum'=>'2014-01-16', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>3, 'izpitni_rok'=>2, 'datum'=>'2014-02-04', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>3, 'izpitni_rok'=>3, 'datum'=>'2014-09-06', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>4, 'izpitni_rok'=>1, 'datum'=>'2014-01-19', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>4, 'izpitni_rok'=>2, 'datum'=>'2014-02-07', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>4, 'izpitni_rok'=>3, 'datum'=>'2014-09-09', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>5, 'izpitni_rok'=>1, 'datum'=>'2014-01-10', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>5, 'izpitni_rok'=>2, 'datum'=>'2014-02-12', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>5, 'izpitni_rok'=>3, 'datum'=>'2014-09-19', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>6, 'izpitni_rok'=>1, 'datum'=>'2014-06-19', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>6, 'izpitni_rok'=>2, 'datum'=>'2014-06-30', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>6, 'izpitni_rok'=>3, 'datum'=>'2014-09-06', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>7, 'izpitni_rok'=>1, 'datum'=>'2014-06-24', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>7, 'izpitni_rok'=>2, 'datum'=>'2014-07-04', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>7, 'izpitni_rok'=>3, 'datum'=>'2014-09-23', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>8, 'izpitni_rok'=>1, 'datum'=>'2014-06-09', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>8, 'izpitni_rok'=>2, 'datum'=>'2014-06-22', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>8, 'izpitni_rok'=>3, 'datum'=>'2014-09-20', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>9, 'izpitni_rok'=>1, 'datum'=>'2014-06-25', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>9, 'izpitni_rok'=>2, 'datum'=>'2014-06-29', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>9, 'izpitni_rok'=>3, 'datum'=>'2014-08-31', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>10, 'izpitni_rok'=>1, 'datum'=>'2014-01-17', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>10, 'izpitni_rok'=>2, 'datum'=>'2014-02-09', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>10, 'izpitni_rok'=>3, 'datum'=>'2014-09-07', 'studijsko_leto'=>'2013/2014', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);

        //2014/2015 1.letnik BUN-RI
        IzpitniRok::create(['id_predmeta'=>1, 'izpitni_rok'=>1, 'datum'=>'2015-01-21', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>1, 'izpitni_rok'=>2, 'datum'=>'2015-02-05', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>1, 'izpitni_rok'=>3, 'datum'=>'2015-09-08', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>2, 'izpitni_rok'=>1, 'datum'=>'2015-02-01', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>2, 'izpitni_rok'=>2, 'datum'=>'2015-02-18', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>2, 'izpitni_rok'=>3, 'datum'=>'2015-09-04', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>3, 'izpitni_rok'=>1, 'datum'=>'2015-01-16', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>3, 'izpitni_rok'=>2, 'datum'=>'2015-02-04', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>3, 'izpitni_rok'=>3, 'datum'=>'2015-09-06', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>4, 'izpitni_rok'=>1, 'datum'=>'2015-01-19', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>4, 'izpitni_rok'=>2, 'datum'=>'2015-02-07', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>4, 'izpitni_rok'=>3, 'datum'=>'2015-09-09', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>5, 'izpitni_rok'=>1, 'datum'=>'2015-01-10', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>5, 'izpitni_rok'=>2, 'datum'=>'2015-02-12', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>5, 'izpitni_rok'=>3, 'datum'=>'2015-09-19', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>6, 'izpitni_rok'=>1, 'datum'=>'2015-06-19', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>6, 'izpitni_rok'=>2, 'datum'=>'2015-06-30', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>6, 'izpitni_rok'=>3, 'datum'=>'2015-09-06', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>7, 'izpitni_rok'=>1, 'datum'=>'2015-06-24', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>7, 'izpitni_rok'=>2, 'datum'=>'2015-07-04', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>7, 'izpitni_rok'=>3, 'datum'=>'2015-09-23', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>8, 'izpitni_rok'=>1, 'datum'=>'2015-06-09', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>8, 'izpitni_rok'=>2, 'datum'=>'2015-06-22', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>8, 'izpitni_rok'=>3, 'datum'=>'2015-09-20', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>9, 'izpitni_rok'=>1, 'datum'=>'2015-06-25', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>9, 'izpitni_rok'=>2, 'datum'=>'2015-06-29', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>9, 'izpitni_rok'=>3, 'datum'=>'2015-08-31', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>10, 'izpitni_rok'=>1, 'datum'=>'2015-01-17', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>10, 'izpitni_rok'=>2, 'datum'=>'2015-02-09', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);
        IzpitniRok::create(['id_predmeta'=>10, 'izpitni_rok'=>3, 'datum'=>'2015-09-07', 'studijsko_leto'=>'2014/2015', 'ura_izpita'=>'12:30:00', 'predavalnice'=>'P1, P22']);

    }
}