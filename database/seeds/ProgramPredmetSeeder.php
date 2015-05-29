<?php
/**
 * Created by PhpStorm.
 * User: Neza
 * Date: 27.4.2015
 * Time: 21:26
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class ProgramPredmetSeeder extends Seeder
{

    public function run()
    {
        DB::table('program_predmet')->truncate();

        //1.letnik BUN-RI 2014/2015
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>1, 'id_nosilca1'=>1, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>2, 'id_nosilca1'=>2, 'id_nosilca2'=>27, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>3, 'id_nosilca1'=>3, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>4, 'id_nosilca1'=>10, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>5, 'id_nosilca1'=>11, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>6, 'id_nosilca1'=>12, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>7, 'id_nosilca1'=>13, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>8, 'id_nosilca1'=>14, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>9, 'id_nosilca1'=>15, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>10, 'id_nosilca1'=>16, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);

        //2.letnik BUN-RI 2014/2015
        /*DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>11, 'id_nosilca1'=>17, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>12, 'id_nosilca1'=>18, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>13, 'id_nosilca1'=>8, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>14, 'id_nosilca1'=>19, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>15, 'id_nosilca1'=>20, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>16, 'id_nosilca1'=>21, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>17, 'id_nosilca1'=>19, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>18, 'id_nosilca1'=>22, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>19, 'id_nosilca1'=>2, 'id_nosilca2'=>27, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'strokovni-izbirni', 'studijsko_leto'=>'2014/2015']);
*/
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>32, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>33, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>34, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>35, 'id_nosilca1'=>30, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>36, 'id_nosilca1'=>6, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>37, 'id_nosilca1'=>31, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>38, 'id_nosilca1'=>32, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>39, 'id_nosilca1'=>33, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);

        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>11, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>12, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>13, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>14, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>15, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>16, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>17, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>18, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>19, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'strokovni-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>53, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'strokovni-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>54, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'strokovni-izbirni', 'studijsko_leto'=>'2014/2015']);

        /*DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>32,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>33,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>34,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>35,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>36,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>37,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>38,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>39,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);*/

        //3.letnik BUN-RI 2014/15
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>20, 'id_nosilca1'=>6, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>3, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>21, 'id_nosilca1'=>7, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>3, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>22, 'id_nosilca1'=>4, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>3, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>23, 'id_nosilca1'=>5, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>3, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>24, 'id_nosilca1'=>1, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'modulski', 'id_modula'=>3, 'studijsko_leto'=>'2014/2015','konec_predavanj'=>'2015-04-25']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>25, 'id_nosilca1'=>24, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>11, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>26, 'id_nosilca1'=>25, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>11, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>27, 'id_nosilca1'=>26, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'modulski', 'id_modula'=>11, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>28, 'id_nosilca1'=>9, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'modulski', 'id_modula'=>11, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>29, 'id_nosilca1'=>27, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'modulski', 'id_modula'=>11, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>30, 'id_nosilca1'=>15, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'modulski', 'id_modula'=>11, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>31, 'id_nosilca1'=>18, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'modulski', 'id_modula'=>11, 'studijsko_leto'=>'2014/2015']);

        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>32, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>33, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>34, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>35, 'id_nosilca1'=>30, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>36, 'id_nosilca1'=>6, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>37, 'id_nosilca1'=>31, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>38, 'id_nosilca1'=>32, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>39, 'id_nosilca1'=>33, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);

        //2.letnik BUN-RI 2015/2016
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>11,'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>12,'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>13,'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>14,'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>15,'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>16,'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>17,'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>18,'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>19,'letnik'=>2, 'semester'=>2,'tip'=>'strokovni-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>53,'letnik'=>2, 'semester'=>2,'tip'=>'strokovni-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>54,'letnik'=>2, 'semester'=>2,'tip'=>'strokovni-izbirni', 'studijsko_leto'=>'2015/2016']);

        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>32,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>33,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>34,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>35,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>36,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>37,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>38,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>39,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);

        
        //3.letnik BUN-RI 2015/16
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>22, 'id_nosilca1'=>23, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>4, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>23, 'id_nosilca1'=>5, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>4, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>24, 'id_nosilca1'=>1, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'modulski', 'id_modula'=>4, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>25, 'id_nosilca1'=>24, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>12, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>26, 'id_nosilca1'=>25, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>12, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>27, 'id_nosilca1'=>26, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'modulski', 'id_modula'=>12, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>40, 'id_nosilca1'=>22, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>24, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>41, 'id_nosilca1'=>21, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>24, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>42, 'id_nosilca1'=>34, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'modulski', 'id_modula'=>24, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>20, 'id_nosilca1'=>6, 'id_nosilca2'=>0, 'id_nosilca3'=>0,  'letnik'=>3, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>21, 'id_nosilca1'=>7, 'id_nosilca2'=>28, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>44, 'id_nosilca1'=>35, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2015/2016']);


        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>32, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>33, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>34, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>35, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>36, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>37, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>38, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>39, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);

        //1.letnik BMAG 2015/2016
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>28, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni',  'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>29, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni',  'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>30, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni',  'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>31, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni',  'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>45, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>2, 'semester'=>2,'tip'=>'obvezni',  'studijsko_leto'=>'2015/2016']);

        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>46, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>1, 'semester'=>1,'tip'=>'strokovni-izbirni',  'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>47, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>1, 'semester'=>1,'tip'=>'strokovni-izbirni',  'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>48, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>1, 'semester'=>1,'tip'=>'strokovni-izbirni',  'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>49, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>1, 'semester'=>2,'tip'=>'strokovni-izbirni',  'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>50, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>1, 'semester'=>2,'tip'=>'strokovni-izbirni',  'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>51, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>1, 'semester'=>2,'tip'=>'strokovni-izbirni',  'studijsko_leto'=>'2015/2016', 'konec_predavanj'=>'2016-06-11']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>52, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>1, 'semester'=>2,'tip'=>'strokovni-izbirni',  'studijsko_leto'=>'2015/2016']);

        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>36, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>1, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>37, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>1, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>38, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>1, 'semester'=>1,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>39, 'id_nosilca1'=>1, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>1, 'semester'=>1,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);

        //1.letnik BUN-RI 2013/2014
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>1, 'id_nosilca1'=>1, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>2, 'id_nosilca1'=>2, 'id_nosilca2'=>27, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>3, 'id_nosilca1'=>3, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>4, 'id_nosilca1'=>10, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>5, 'id_nosilca1'=>11, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>6, 'id_nosilca1'=>12, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>7, 'id_nosilca1'=>13, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>8, 'id_nosilca1'=>14, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>9, 'id_nosilca1'=>15, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>10, 'id_nosilca1'=>16, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);

        //2.letnik BUN-RI 2013/2014
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>11, 'id_nosilca1'=>17, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>12, 'id_nosilca1'=>18, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>13, 'id_nosilca1'=>8, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>14, 'id_nosilca1'=>19, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>15, 'id_nosilca1'=>20, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>16, 'id_nosilca1'=>21, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>17, 'id_nosilca1'=>19, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>18, 'id_nosilca1'=>22, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>19, 'id_nosilca1'=>2, 'id_nosilca2'=>27, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'strokovni-izbirni', 'studijsko_leto'=>'2013/2014']);

        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>32, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>33, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>34, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>35, 'id_nosilca1'=>30, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>36, 'id_nosilca1'=>6, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>37, 'id_nosilca1'=>31, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>38, 'id_nosilca1'=>32, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2013/2014']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>39, 'id_nosilca1'=>33, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2013/2014']);

        //1.letnik BUN-RI 2012/2013
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>1, 'id_nosilca1'=>1, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>2, 'id_nosilca1'=>2, 'id_nosilca2'=>27, 'id_nosilca3'=>3, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>3, 'id_nosilca1'=>3, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>4, 'id_nosilca1'=>10, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>5, 'id_nosilca1'=>11, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>6, 'id_nosilca1'=>12, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>7, 'id_nosilca1'=>13, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>8, 'id_nosilca1'=>14, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>9, 'id_nosilca1'=>15, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>10, 'id_nosilca1'=>16, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);

        //2.letnik BUN-RI 2012/2013
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>11, 'id_nosilca1'=>17, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>12, 'id_nosilca1'=>18, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>13, 'id_nosilca1'=>8, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>14, 'id_nosilca1'=>19, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>15, 'id_nosilca1'=>20, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>16, 'id_nosilca1'=>21, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>17, 'id_nosilca1'=>19, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>18, 'id_nosilca1'=>22, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>19, 'id_nosilca1'=>2, 'id_nosilca2'=>27, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'strokovni-izbirni', 'studijsko_leto'=>'2012/2013']);

        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>32, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>33, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>34, 'id_nosilca1'=>29, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>35, 'id_nosilca1'=>30, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>36, 'id_nosilca1'=>6, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>37, 'id_nosilca1'=>31, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>38, 'id_nosilca1'=>32, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2012/2013']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>39, 'id_nosilca1'=>33, 'id_nosilca2'=>2, 'id_nosilca3'=>3, 'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2012/2013']);

        //programiranje in algoritmi 2014/2015
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>55, 'id_nosilca1'=>17, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>55, 'id_nosilca1'=>35, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>1, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);

        //mag 2014/2015
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>40, 'id_nosilca1'=>22, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>41, 'id_nosilca1'=>21, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>42, 'id_nosilca1'=>34, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>43, 'id_nosilca1'=>1, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>44, 'id_nosilca1'=>35, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>45, 'id_nosilca1'=>35, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>46, 'id_nosilca1'=>10, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>47, 'id_nosilca1'=>8, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>48, 'id_nosilca1'=>3, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>49, 'id_nosilca1'=>13, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>50, 'id_nosilca1'=>4, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>51, 'id_nosilca1'=>6, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>52, 'id_nosilca1'=>17, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>53, 'id_nosilca1'=>17, 'id_nosilca2'=>0, 'id_nosilca3'=>0, 'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);

    }
}