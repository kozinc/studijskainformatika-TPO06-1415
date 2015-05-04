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
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>1,'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>2,'letnik'=>1, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>3,'letnik'=>1, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>4,'letnik'=>1, 'semester'=>2,'tip'=>'strokovni-izbirni', 'studijsko_leto'=>'2014/2015']);

        //2.letnik BUN-RI 2014/2015
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>11,'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>12,'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>13,'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>14,'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>15,'letnik'=>2, 'semester'=>1,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>16,'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>17,'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>18,'letnik'=>2, 'semester'=>2,'tip'=>'obvezni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>19,'letnik'=>2, 'semester'=>2,'tip'=>'strokovni-izbirni', 'studijsko_leto'=>'2014/2015']);

        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>32,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>33,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>34,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>35,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>36,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>37,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>38,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>39,'letnik'=>2, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);

        //3.letnik BUN-RI 2014/15
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>6,'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>3, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>7,'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>3, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>8,'letnik'=>3, 'semester'=>2,'tip'=>'modulski', 'id_modula'=>3, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>25,'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>11, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>26,'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>11, 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>27,'letnik'=>3, 'semester'=>2,'tip'=>'modulski', 'id_modula'=>11, 'studijsko_leto'=>'2014/2015']);

        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>32,'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>33,'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>34,'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>35,'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>36,'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>37,'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>38,'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>39,'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2014/2015']);

        //3.letnik BUN-RI 2015/16
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>6,'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>4, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>7,'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>4, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>8,'letnik'=>3, 'semester'=>2,'tip'=>'modulski', 'id_modula'=>4, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>25,'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>12, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>26,'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>12, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>27,'letnik'=>3, 'semester'=>2,'tip'=>'modulski', 'id_modula'=>12, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>40,'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>24, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>41,'letnik'=>3, 'semester'=>1,'tip'=>'modulski', 'id_modula'=>24, 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>42,'letnik'=>3, 'semester'=>2,'tip'=>'modulski', 'id_modula'=>24, 'studijsko_leto'=>'2015/2016']);


        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>32,'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>33,'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>34,'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>35,'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>36,'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>37,'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>38,'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>1, 'id_predmeta'=>39,'letnik'=>3, 'semester'=>2,'tip'=>'splošno-izbirni', 'studijsko_leto'=>'2015/2016']);
        
        //1.letnik BMAG 2015/2016
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>28,'letnik'=>1, 'semester'=>2,'tip'=>'obvezni',  'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>29,'letnik'=>1, 'semester'=>1,'tip'=>'obvezni',  'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>30,'letnik'=>1, 'semester'=>1,'tip'=>'obvezni',  'studijsko_leto'=>'2015/2016']);
        DB::table('program_predmet')->insert(['id_programa'=>3, 'id_predmeta'=>31,'letnik'=>1, 'semester'=>2,'tip'=>'obvezni',  'studijsko_leto'=>'2015/2016']);

    }
}