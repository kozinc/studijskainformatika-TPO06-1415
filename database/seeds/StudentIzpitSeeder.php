<?php
/**
 * Created by PhpStorm.
 * User: Neza
 * Date: 27.4.2015
 * Time: 21:25
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class StudentIzpitSeeder extends Seeder
{

    public function run()
    {

        /*NE SPREMINJAJ ROKE Z ID_STUDENTA = 4*/

        DB::table('student_izpit')->truncate();
        //Janez Novak v 1.letniku
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>1, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>2, 'ocena'=>8]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>5, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>6, 'ocena'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>7, 'ocena'=>9]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>10, 'ocena'=>8]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>13, 'ocena'=>9]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>17, 'ocena'=>8]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>19, 'ocena'=>9]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>22, 'ocena'=>8]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>25, 'ocena'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>29, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>30, 'ocena'=>6]);

        //Janez Novak v 2.letniku
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>31, 'ocena'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>34, 'ocena'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>37, 'ocena'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>40, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>41, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>42, 'ocena'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>43, 'ocena'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>46, 'ocena'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>49, 'ocena'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>52, 'ocena'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>55, 'ocena'=>10]);

        //Janez Novak v 3.letniku
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>60, 'ocena'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>61, 'ocena'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>64, 'ocena'=>9]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>67, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>68, 'ocena'=>8]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>70, 'ocena'=>7]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>73, 'ocena'=>9]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>76, 'ocena'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>79, 'ocena'=>7]);

        //Nejc Bizjak v 1.letniku
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>82, 'ocena'=>8]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>85, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>86, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>87, 'ocena'=>6]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>88, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>89, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>90, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>91, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>93, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>94, 'ocena'=>8]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>97, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>98, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>101, 'ocena'=>6]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>103, 'ocena'=>6]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>106, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>107, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>108, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>109, 'ocena'=>10]);

        //Nejc Bizjak ponovno v 1.letniku :(
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>118, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>119, 'ocena'=>8]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>121, 'ocena'=>9]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>127, 'ocena'=>9]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>137, 'ocena'=>9]);


    }

}