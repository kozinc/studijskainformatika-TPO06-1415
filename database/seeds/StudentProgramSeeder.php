<?php
/**
 * Created by PhpStorm.
 * User: Neza
 * Date: 27.4.2015
 * Time: 21:27
 */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentProgram;

class StudentProgramSeeder extends Seeder
{

    public function run()
    {
        DB::table('student_program')->truncate();

        //NE SPREMINJAJ ZA STUDENTA Z ID = 4 !!!!!!!!
        DB::table('student_program')->insert(['id_studenta'=>4, 'id_programa'=>1, 'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2012-09-20', 'vloga_potrjena'=>'2012-09-26', 'datum_vpisa'=>'2012-09-26', 'studijsko_leto'=>'2012/2013', 'letnik'=>1]);
        DB::table('student_program')->insert(['id_studenta'=>4, 'id_programa'=>1, 'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2013-09-20', 'vloga_potrjena'=>'2013-09-26', 'datum_vpisa'=>'2013-09-26', 'studijsko_leto'=>'2013/2014', 'letnik'=>2]);
        DB::table('student_program')->insert(['id_studenta'=>4, 'id_programa'=>1, 'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-26', 'datum_vpisa'=>'2014-09-26', 'studijsko_leto'=>'2014/2015', 'letnik'=>3]);
        DB::table('student_program')->insert(['id_studenta'=>4, 'id_programa'=>3, 'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>null, 'vloga_potrjena'=>null, 'datum_vpisa'=>null, 'studijsko_leto'=>'2015/2016', 'letnik'=>1]);

        //NE SPREMINJAJ ZA STUDENTA Z ID = 3 !!!!!!!!
        DB::table('student_program')->insert(['id_studenta'=>3, 'id_programa'=>1, 'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2013-09-20', 'vloga_potrjena'=>'2013-09-26', 'datum_vpisa'=>'2013-09-26', 'studijsko_leto'=>'2013/2014', 'letnik'=>1]);
        DB::table('student_program')->insert(['id_studenta'=>3, 'id_programa'=>1, 'vrsta_vpisa'=>2, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-26', 'datum_vpisa'=>'2014-09-26', 'studijsko_leto'=>'2014/2015', 'letnik'=>1]);

        //NE SPREMINJAJ ZA STUDENTA Z ID = 16 !!!!!!!!
        DB::table('student_program')->insert(['id_studenta'=>16, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2013-09-20', 'vloga_potrjena'=>'2013-09-20', 'datum_vpisa'=>'2013-09-20', 'studijsko_leto'=>'2013/2014', 'letnik'=>1 ]);
        DB::table('student_program')->insert(['id_studenta'=>16, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-20', 'datum_vpisa'=>'2014-09-20', 'studijsko_leto'=>'2014/2015', 'letnik'=>2 ]);
        DB::table('student_program')->insert(['id_studenta'=>16, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>null, 'vloga_potrjena'=>null, 'datum_vpisa'=>null, 'studijsko_leto'=>'2015/2016', 'letnik'=>3 ]);

        //NE SPREMINJAJ ZA STUDENTA Z ID = 17 !!!!!!!!
        DB::table('student_program')->insert(['id_studenta'=>17, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2012-09-20', 'vloga_potrjena'=>'2012-09-24', 'datum_vpisa'=>'2012-09-24', 'studijsko_leto'=>'2012/2013', 'letnik'=>1 ]);
        DB::table('student_program')->insert(['id_studenta'=>17, 'id_programa'=>1,'vrsta_vpisa'=>5, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2013-09-20', 'vloga_potrjena'=>'2013-09-24', 'datum_vpisa'=>'2013-09-24', 'studijsko_leto'=>'2013/2014', 'letnik'=>1 ]);
        DB::table('student_program')->insert(['id_studenta'=>17, 'id_programa'=>1,'vrsta_vpisa'=>5, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-20', 'datum_vpisa'=>'2014-09-20', 'studijsko_leto'=>'2014/2015', 'letnik'=>1 ]);

        //NE SPREMINJAJ ZA STUDENTA Z ID = 9!!!!!!!!!!!!!!!!!!
        DB::table('student_program')->insert(['id_studenta'=>9, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>1, 'vloga_oddana'=>'2012-09-20', 'vloga_potrjena'=>'2012-09-24', 'datum_vpisa'=>'2012-09-24', 'studijsko_leto'=>'2012/2013', 'letnik'=>1 ]);
        DB::table('student_program')->insert(['id_studenta'=>9, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>1, 'vloga_oddana'=>'2013-09-20', 'vloga_potrjena'=>'2013-09-24', 'datum_vpisa'=>'2013-09-24', 'studijsko_leto'=>'2013/2014', 'letnik'=>2 ]);
        DB::table('student_program')->insert(['id_studenta'=>9, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>1, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>'2014-09-24', 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>9, 'id_programa'=>3, 'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>1, 'vloga_oddana'=>'2015-05-05', 'vloga_potrjena'=>'2015-05-05', 'datum_vpisa'=>'2015-05-05', 'studijsko_leto'=>'2015/2016', 'letnik'=>1]);

        //NE SPREMINAJ ZA STUDENTA Z ID 1!!!!!!!!!!!
        DB::table('student_program')->insert(['id_studenta'=>1, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2013-09-24', 'vloga_potrjena'=>'2013-09-24', 'datum_vpisa'=>'2013-09-24', 'studijsko_leto'=>'2013/2014', 'letnik'=>1 ]);
        DB::table('student_program')->insert(['id_studenta'=>1, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-24', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>'2014-09-24', 'studijsko_leto'=>'2014/2015', 'letnik'=>2 ]);


        DB::table('student_program')->insert(['id_studenta'=>2, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2015-04-01', 'vloga_potrjena'=>null, 'datum_vpisa'=>null, 'studijsko_leto'=>'2015/2016', 'letnik'=>1 ]);
        DB::table('student_program')->insert(['id_studenta'=>5, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2015-04-01', 'vloga_potrjena'=>null, 'datum_vpisa'=>null, 'studijsko_leto'=>'2015/2016', 'letnik'=>1 ]);

        DB::table('student_program')->insert(['id_studenta'=>6, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>1 ]);
        DB::table('student_program')->insert(['id_studenta'=>7, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>1 ]);
        DB::table('student_program')->insert(['id_studenta'=>8, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>1 ]);

        DB::table('student_program')->insert(['id_studenta'=>10, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>2 ]);
        DB::table('student_program')->insert(['id_studenta'=>11, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>2 ]);
        DB::table('student_program')->insert(['id_studenta'=>12, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>2 ]);

        DB::table('student_program')->insert(['id_studenta'=>13, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>14, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>15, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>18, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);

        DB::table('student_program')->insert(['id_studenta'=>19, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);

        DB::table('student_program')->insert(['id_studenta'=>20, 'id_programa'=>1,'vrsta_vpisa'=>5, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>21, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>20, 'id_programa'=>1,'vrsta_vpisa'=>2, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>21, 'id_programa'=>1,'vrsta_vpisa'=>2, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>22, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>23, 'id_programa'=>1,'vrsta_vpisa'=>2, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>24, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>25, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>26, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>27, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);
        DB::table('student_program')->insert(['id_studenta'=>28, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>null, 'studijsko_leto'=>'2014/2015', 'letnik'=>3 ]);

        DB::table('student_program')->insert(['id_studenta'=>29, 'id_programa'=>1,'vrsta_vpisa'=>1, 'nacin_studija'=>'redni', 'prosta_izbira'=>0, 'vloga_oddana'=>'2014-09-20', 'vloga_potrjena'=>'2014-09-24', 'datum_vpisa'=>'2014-09-14', 'studijsko_leto'=>'2014/2015', 'letnik'=>2 ]);
    }
}