<?php
/**
 * Created by PhpStorm.
 * User: Neza
 * Date: 27.4.2015
 * Time: 21:30
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\PredmetNosilec;


class PredmetNosilecSeeder extends Seeder
{

    public function run()
    {
        DB::table('predmet_nosilec')->truncate();

        PredmetNosilec::create(['id_predmeta'=>1, 'studijsko_leto'=>'2012/2013', 'id_nosilca'=>1]);
        PredmetNosilec::create(['id_predmeta'=>1, 'studijsko_leto'=>'2013/2014', 'id_nosilca'=>1]);

        PredmetNosilec::create(['id_predmeta'=>1, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>1]);
        PredmetNosilec::create(['id_predmeta'=>2, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>2]);
        PredmetNosilec::create(['id_predmeta'=>3, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>3]);
        PredmetNosilec::create(['id_predmeta'=>4, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>10]);
        PredmetNosilec::create(['id_predmeta'=>5, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>11]);
        PredmetNosilec::create(['id_predmeta'=>6, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>12]);
        PredmetNosilec::create(['id_predmeta'=>7, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>13]);
        PredmetNosilec::create(['id_predmeta'=>8, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>14]);
        PredmetNosilec::create(['id_predmeta'=>9, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>15]);
        PredmetNosilec::create(['id_predmeta'=>10, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>16]);
        PredmetNosilec::create(['id_predmeta'=>11, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>17]);
        PredmetNosilec::create(['id_predmeta'=>12, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>18]);
        PredmetNosilec::create(['id_predmeta'=>13, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>8]);
        PredmetNosilec::create(['id_predmeta'=>14, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>19]);
        PredmetNosilec::create(['id_predmeta'=>15, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>20]);
        PredmetNosilec::create(['id_predmeta'=>16, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>21]);
        PredmetNosilec::create(['id_predmeta'=>17, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>19]);
        PredmetNosilec::create(['id_predmeta'=>18, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>22]);
        PredmetNosilec::create(['id_predmeta'=>19, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>2]);

        PredmetNosilec::create(['id_predmeta'=>20, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>6]);
        PredmetNosilec::create(['id_predmeta'=>21, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>7, 'id_nosilca2' => 28]);
        PredmetNosilec::create(['id_predmeta'=>22, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>4]);
        PredmetNosilec::create(['id_predmeta'=>23, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>5]);
        PredmetNosilec::create(['id_predmeta'=>24, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>1]);
        PredmetNosilec::create(['id_predmeta'=>25, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>24]);
        PredmetNosilec::create(['id_predmeta'=>26, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>25]);
        PredmetNosilec::create(['id_predmeta'=>27, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>26]);

        PredmetNosilec::create(['id_predmeta'=>28, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>9]);
        PredmetNosilec::create(['id_predmeta'=>29, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>27]);
        PredmetNosilec::create(['id_predmeta'=>30, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>15]);
        PredmetNosilec::create(['id_predmeta'=>31, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>18]);

        PredmetNosilec::create(['id_predmeta'=>32, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>29]);
        PredmetNosilec::create(['id_predmeta'=>33, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>29]);
        PredmetNosilec::create(['id_predmeta'=>34, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>29]);
        PredmetNosilec::create(['id_predmeta'=>35, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>30]);
        PredmetNosilec::create(['id_predmeta'=>36, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>6]);
        PredmetNosilec::create(['id_predmeta'=>37, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>31]);
        PredmetNosilec::create(['id_predmeta'=>38, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>32]);
        PredmetNosilec::create(['id_predmeta'=>39, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>33]);

        PredmetNosilec::create(['id_predmeta'=>40, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>22]);
        PredmetNosilec::create(['id_predmeta'=>41, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>21]);
        PredmetNosilec::create(['id_predmeta'=>42, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>34]);
        PredmetNosilec::create(['id_predmeta'=>43, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>1]);

        PredmetNosilec::create(['id_predmeta'=>44, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>35]);

        PredmetNosilec::create(['id_predmeta'=>45, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>35]);

        PredmetNosilec::create(['id_predmeta'=>46, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>10]);
        PredmetNosilec::create(['id_predmeta'=>47, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>8]);
        PredmetNosilec::create(['id_predmeta'=>48, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>3]);
        PredmetNosilec::create(['id_predmeta'=>49, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>13]);
        PredmetNosilec::create(['id_predmeta'=>50, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>4]);
        PredmetNosilec::create(['id_predmeta'=>51, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>6]);
        PredmetNosilec::create(['id_predmeta'=>52, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>17]);

        PredmetNosilec::create(['id_predmeta'=>53, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>17]);
        PredmetNosilec::create(['id_predmeta'=>54, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>12]);

        PredmetNosilec::create(['id_predmeta'=>55, 'studijsko_leto'=>'2014/2015', 'id_nosilca'=>1]);


    }
}