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
         * Z ID 4 in ID 3 IN 16 IN 9
         * !!!!!!!!!!! Hvala, Neza :)*/
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>8, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>10, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>3, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>9, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>4, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>8, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>5, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>9, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>6, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>8, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>7, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>9, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>8, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>8, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>9, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>10, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>10, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>6, 'zakljucek'=>1]);

        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>11, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10,'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>12, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10,'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>13, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10,'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>14, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10,'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>15, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10,'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>16, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10,'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>17, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10,'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>18, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10,'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>19, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10,'zakljucek'=>1]);

        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>20, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99,'zakljucek'=>0]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>21, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99,'zakljucek'=>0]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>22, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>9, 'tocke_izpita'=>8,'zakljucek'=>0]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>23, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8, 'tocke_izpita'=>78,'zakljucek'=>0]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>24, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'tocke_izpita'=>68, 'zakljucek'=>0, 'datum_vnosa_ocene'=>'2015-05-01']);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>25, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>9, 'tocke_izpita'=>87,'zakljucek'=>0]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>26, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>94,'zakljucek'=>0]);
        StudentPredmet::create(['id_studenta'=>4, 'id_predmeta'=>27, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>7, 'tocke_izpita'=>60,'zakljucek'=>0]);

        StudentPredmet::create(['id_studenta'=>3, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>3, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>6]);
        StudentPredmet::create(['id_studenta'=>3, 'id_predmeta'=>3, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>5]);
        StudentPredmet::create(['id_studenta'=>3, 'id_predmeta'=>4, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>5]);
        StudentPredmet::create(['id_studenta'=>3, 'id_predmeta'=>5, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>3, 'id_predmeta'=>6, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>5]);
        StudentPredmet::create(['id_studenta'=>3, 'id_predmeta'=>7, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>9]);
        StudentPredmet::create(['id_studenta'=>3, 'id_predmeta'=>8, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>3, 'id_predmeta'=>9, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>5]);
        StudentPredmet::create(['id_studenta'=>3, 'id_predmeta'=>10, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>6]);

        StudentPredmet::create(['id_studenta'=>3, 'id_predmeta'=>3, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8, 'tocke_izpita'=>70]);
        StudentPredmet::create(['id_studenta'=>3, 'id_predmeta'=>4, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>6, 'tocke_izpita'=>50]);
        StudentPredmet::create(['id_studenta'=>3, 'id_predmeta'=>6, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>9, 'tocke_izpita'=>86]);
        StudentPredmet::create(['id_studenta'=>3, 'id_predmeta'=>9, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>9, 'tocke_izpita'=>81]);

        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>6]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>3, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>4, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>5, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>6]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>6, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>7, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>8, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>9, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>10, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>6]);

        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>11, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>12, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>13, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>14, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>15, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>16, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>17, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>18, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>19, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>16, 'id_predmeta'=>37, 'letnik'=>2, 'semester'=>7, 'studijsko_leto'=>'2014/2015', 'ocena'=>9]);
        //Rok Pogorelc
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>3, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>4, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>9]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>5, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>6, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>7, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>8, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>9, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>10, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>9]);

        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>11, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>12, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>9]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>13, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>14, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>15, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>16, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>17, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>18, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>19, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>17, 'id_predmeta'=>37, 'letnik'=>2, 'semester'=>7, 'studijsko_leto'=>'2014/2015', 'ocena'=>9]);

        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>8, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>10, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>3, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>9, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>4, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>8, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>5, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2012/2013', 'ocena'=>9, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>6, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>8, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>7, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>9, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>8, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>8, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>9, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>10, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>10, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2012/2013', 'ocena'=>8, 'zakljucek'=>1]);

        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>11, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>10, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>12, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>9, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>13, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>9, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>14, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>9, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>15, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>9, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>16, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>17, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>18, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>19, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>36, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>10, 'zakljucek'=>1]);

        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>20, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>22, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>9, 'tocke_izpita'=>83, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>23, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8, 'tocke_izpita'=>78, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>26, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>94, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>27, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>7, 'tocke_izpita'=>60, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>37, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>40, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>7, 'tocke_izpita'=>68, 'zakljucek'=>1]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>41, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>9, 'tocke_izpita'=>87, 'zakljucek'=>1]);


        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>28, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2015/2016', 'tocke_izpita'=>94,'zakljucek'=>0]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>29, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2015/2016','zakljucek'=>0]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>30, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2015/2016','zakljucek'=>0]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>31, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2015/2016','zakljucek'=>0]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>41, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2015/2016','zakljucek'=>0]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>50, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2015/2016','zakljucek'=>0]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>51, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2015/2016', 'tocke_izpita'=>68,'zakljucek'=>0]);
        StudentPredmet::create(['id_studenta'=>9, 'id_predmeta'=>52, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2015/2016','zakljucek'=>0]);

        StudentPredmet::create(['id_studenta'=>1, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>1, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>6]);
        StudentPredmet::create(['id_studenta'=>1, 'id_predmeta'=>3, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>1, 'id_predmeta'=>4, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>1, 'id_predmeta'=>5, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2013/2014', 'ocena'=>6]);
        StudentPredmet::create(['id_studenta'=>1, 'id_predmeta'=>6, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>1, 'id_predmeta'=>7, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>8]);
        StudentPredmet::create(['id_studenta'=>1, 'id_predmeta'=>8, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>1, 'id_predmeta'=>9, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>7]);
        StudentPredmet::create(['id_studenta'=>1, 'id_predmeta'=>10, 'letnik'=>1, 'semester'=>2, 'studijsko_leto'=>'2013/2014', 'ocena'=>6]);
        ////////////////////////////////OSTALI

        StudentPredmet::create(['id_studenta'=>5, 'id_predmeta'=>24, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>9, 'tocke_izpita'=>87]);
        StudentPredmet::create(['id_studenta'=>6, 'id_predmeta'=>24, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>5, 'tocke_izpita'=>45]);
        StudentPredmet::create(['id_studenta'=>7, 'id_predmeta'=>24, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'tocke_izpita'=>59]);


        StudentPredmet::create(['id_studenta'=>5, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>6, 'tocke_izpita'=>55]);
        StudentPredmet::create(['id_studenta'=>6, 'id_predmeta'=>1, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8, 'tocke_izpita'=>72]);

        StudentPredmet::create(['id_studenta'=>5, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8, 'tocke_izpita'=>73]);
        StudentPredmet::create(['id_studenta'=>6, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>5, 'tocke_izpita'=>43]);
        StudentPredmet::create(['id_studenta'=>7, 'id_predmeta'=>2, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>95]);

        StudentPredmet::create(['id_studenta'=>7, 'id_predmeta'=>3, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>9, 'tocke_izpita'=>85]);
        StudentPredmet::create([ 'id_studenta'=>8, 'id_predmeta'=>3, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>7, 'tocke_izpita'=>63]);
        StudentPredmet::create(['id_studenta'=>10, 'id_predmeta'=>3, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8, 'tocke_izpita'=>74]);

        StudentPredmet::create(['id_studenta'=>7, 'id_predmeta'=>4, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8, 'tocke_izpita'=>73]);
        StudentPredmet::create(['id_studenta'=>8, 'id_predmeta'=>4, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>6, 'tocke_izpita'=>55]);
        StudentPredmet::create(['id_studenta'=>10, 'id_predmeta'=>4, 'letnik'=>2, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>9, 'tocke_izpita'=>85]);
        StudentPredmet::create(['id_studenta'=>11, 'id_predmeta'=>4, 'letnik'=>1, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>8, 'tocke_izpita'=>73]);

        StudentPredmet::create(['id_studenta'=>11, 'id_predmeta'=>5, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8, 'tocke_izpita'=>75]);
        StudentPredmet::create(['id_studenta'=>12, 'id_predmeta'=>5, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>9, 'tocke_izpita'=>55]);
        StudentPredmet::create(['id_studenta'=>13, 'id_predmeta'=>5, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>5, 'tocke_izpita'=>44]);
        StudentPredmet::create(['id_studenta'=>14, 'id_predmeta'=>5, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>93]);

        StudentPredmet::create(['id_studenta'=>15, 'id_predmeta'=>6, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>5, 'tocke_izpita'=>24]);
        StudentPredmet::create(['id_studenta'=>18, 'id_predmeta'=>6, 'letnik'=>3, 'semester'=>1, 'studijsko_leto'=>'2014/2015', 'ocena'=>6, 'tocke_izpita'=>55]);

        StudentPredmet::create(['id_studenta'=>15, 'id_predmeta'=>7, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>8, 'tocke_izpita'=>72]);
        StudentPredmet::create(['id_studenta'=>18, 'id_predmeta'=>7, 'letnik'=>3, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);

        StudentPredmet::create(['id_studenta'=>19, 'id_predmeta'=>13, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>20, 'id_predmeta'=>13, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>21, 'id_predmeta'=>13, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>22, 'id_predmeta'=>13, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>23, 'id_predmeta'=>13, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>24, 'id_predmeta'=>13, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>25, 'id_predmeta'=>13, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>26, 'id_predmeta'=>13, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>27, 'id_predmeta'=>13, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>28, 'id_predmeta'=>13, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);

        StudentPredmet::create(['id_studenta'=>19, 'id_predmeta'=>32, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>20, 'id_predmeta'=>32, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>21, 'id_predmeta'=>32, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>22, 'id_predmeta'=>32, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>23, 'id_predmeta'=>32, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>24, 'id_predmeta'=>32, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>25, 'id_predmeta'=>32, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>26, 'id_predmeta'=>32, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>27, 'id_predmeta'=>32, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>28, 'id_predmeta'=>32, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);

        StudentPredmet::create(['id_studenta'=>19, 'id_predmeta'=>11, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>20, 'id_predmeta'=>11, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>21, 'id_predmeta'=>11, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>22, 'id_predmeta'=>11, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>23, 'id_predmeta'=>11, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>24, 'id_predmeta'=>11, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>25, 'id_predmeta'=>11, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>26, 'id_predmeta'=>11, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>27, 'id_predmeta'=>11, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);
        StudentPredmet::create(['id_studenta'=>28, 'id_predmeta'=>11, 'letnik'=>2, 'semester'=>2, 'studijsko_leto'=>'2014/2015', 'ocena'=>10, 'tocke_izpita'=>99]);

    }
}