<?php
/**
 * Created by PhpStorm.
 * User: Neza
 * Date: 27.4.2015
 * Time: 21:19
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentPredmet;


class StudentPredmetSeeder extends Seeder
{

    public function run()
    {
        DB::table('student_predmet')->truncate();
////////////////////////////JANEZ NOVAK, KARTOTECNI LIST
        /*
         * NE
         * SPREMINJAJ
         * STUDENTA
         * Z ID 4
         * !!!!!!!!!!! Hvala, Neza :)*/
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>3, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>9]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>4, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>5, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>9]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>6, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>7, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>9]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>8, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>9, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>10, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>6]);

        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>11, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>12, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>13, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>14, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>15, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>16, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>17, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>18, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>19, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);

        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>20, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>21, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>22, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>9]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>23, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>24, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>25, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>9]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>26, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>27, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>7]);

        ////////////////////////////////OSTALI

        StudentPredmet::create(['id_studenta'=>5, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>6, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

        StudentPredmet::create(['id_studenta'=>5, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>6, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>7, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

        StudentPredmet::create(['id_studenta'=>7, 'id_predmeta'=>3, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create([ 'id_studenta'=>8, 'id_predmeta'=>3, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>3, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>10, 'id_predmeta'=>3, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

        StudentPredmet::create(['id_studenta'=>7, 'id_predmeta'=>4, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>8, 'id_predmeta'=>4, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>4, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>10, 'id_predmeta'=>4, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>11, 'id_predmeta'=>4, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

        StudentPredmet::create(['id_studenta'=>11, 'id_predmeta'=>5, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>12, 'id_predmeta'=>5, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>13, 'id_predmeta'=>5, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>14, 'id_predmeta'=>5, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

        StudentPredmet::create(['id_studenta'=>15, 'id_predmeta'=>6, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>6, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>6, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>18, 'id_predmeta'=>6, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>19, 'id_predmeta'=>6, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

        StudentPredmet::create(['id_studenta'=>15, 'id_predmeta'=>7, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>7, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>7, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>18, 'id_predmeta'=>7, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>19, 'id_predmeta'=>7, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);

    }
}