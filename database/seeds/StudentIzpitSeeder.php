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
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>1, 'ocena'=>5, 'tocke_izpita'=>37]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>2, 'ocena'=>8, 'tocke_izpita'=>73]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>5, 'ocena'=>5, 'tocke_izpita'=>46]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>6, 'ocena'=>10, 'tocke_izpita'=>90]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>7, 'ocena'=>9, 'tocke_izpita'=>89]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>10, 'ocena'=>8, 'tocke_izpita'=>73]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>13, 'ocena'=>9, 'tocke_izpita'=>86]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>17, 'ocena'=>8, 'tocke_izpita'=>75]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>19, 'ocena'=>9, 'tocke_izpita'=>89]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>22, 'ocena'=>8, 'tocke_izpita'=>73]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>25, 'ocena'=>10, 'tocke_izpita'=>96]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>29, 'ocena'=>5, 'tocke_izpita'=>33]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>30, 'ocena'=>6, 'tocke_izpita'=>58]);

        //Janez Novak v 2.letniku
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>31, 'ocena'=>10, 'tocke_izpita'=>93]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>34, 'ocena'=>10, 'tocke_izpita'=>92]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>37, 'ocena'=>10, 'tocke_izpita'=>97]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>40, 'ocena'=>5, 'tocke_izpita'=>28]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>41, 'ocena'=>5, 'tocke_izpita'=>24]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>42, 'ocena'=>10, 'tocke_izpita'=>90]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>43, 'ocena'=>10, 'tocke_izpita'=>90]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>46, 'ocena'=>10, 'tocke_izpita'=>92]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>49, 'ocena'=>10, 'tocke_izpita'=>97]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>52, 'ocena'=>10, 'tocke_izpita'=>96]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>55, 'ocena'=>10, 'tocke_izpita'=>94]);

        //Janez Novak v 3.letniku
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>60, 'ocena'=>10, 'tocke_izpita'=>96]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>61, 'ocena'=>10, 'tocke_izpita'=>99]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>64, 'ocena'=>9, 'tocke_izpita'=>85]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>67, 'ocena'=>5, 'tocke_izpita'=>24]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>68, 'ocena'=>8, 'tocke_izpita'=>78]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>70, 'tocke_izpita'=>45, 'ocena'=>5]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>71, 'tocke_izpita'=>68]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>73, 'ocena'=>9, 'tocke_izpita'=>85]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>77, 'ocena'=>5, 'tocke_izpita'=>45]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>78]);
        DB::table('student_izpit')->insert(['id_studenta'=>4, 'id_izpitnega_roka'=>79, 'ocena'=>5, 'tocke_izpita'=>32, 'datum_vnosa_ocene'=>'2015-05-23']);


        
        //Nejc Bizjak v 1.letniku
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>82, 'ocena'=>8, 'tocke_izpita'=>74]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>85, 'ocena'=>5, 'tocke_izpita'=>12]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>86, 'ocena'=>5, 'tocke_izpita'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>87, 'ocena'=>6, 'tocke_izpita'=>58]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>88, 'ocena'=>5, 'tocke_izpita'=>29]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>89, 'ocena'=>5, 'tocke_izpita'=>25]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>90, 'ocena'=>5, 'tocke_izpita'=>24]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>91, 'ocena'=>5, 'tocke_izpita'=>38]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>93, 'ocena'=>5, 'tocke_izpita'=>20]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>94, 'ocena'=>8, 'tocke_izpita'=>74]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>97, 'ocena'=>5, 'tocke_izpita'=>24]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>98, 'ocena'=>5, 'tocke_izpita'=>42]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>101, 'ocena'=>6, 'tocke_izpita'=>58]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>103, 'ocena'=>6, 'tocke_izpita'=>57]);
        //DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>106, 'ocena'=>5, 'tocke_izpita'=>14]);
        //DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>107, 'ocena'=>5, 'tocke_izpita'=>33]);
        //DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>108, 'ocena'=>5, 'tocke_izpita'=>24]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>109, 'ocena'=>10, 'tocke_izpita'=>96]);

        //Nejc Bizjak ponovno v 1.letniku :(
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>118, 'ocena'=>4, 'tocke_izpita'=>38]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>119, 'ocena'=>5, 'tocke_izpita'=>41]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>120, 'ocena'=>5, 'tocke_izpita'=>744]);
        DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>121, 'ocena'=>9, 'tocke_izpita'=>89]);
        //DB::table('student_izpit')->insert(['id_studenta'=>3, 'id_izpitnega_roka'=>127, 'ocena'=>9, 'tocke_izpita'=>83]);

        //Ivanka Uhan v 1.letniku
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>2, 'ocena'=>8, 'tocke_izpita'=>73]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>6, 'ocena'=>10, 'tocke_izpita'=>90]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>7, 'ocena'=>9, 'tocke_izpita'=>89]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>10, 'ocena'=>8, 'tocke_izpita'=>73]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>13, 'ocena'=>9, 'tocke_izpita'=>86]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>17, 'ocena'=>8, 'tocke_izpita'=>75]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>19, 'ocena'=>9, 'tocke_izpita'=>89]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>22, 'ocena'=>8, 'tocke_izpita'=>73]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>25, 'ocena'=>10, 'tocke_izpita'=>96]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>29, 'ocena'=>5, 'tocke_izpita'=>33]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>30, 'ocena'=>8, 'tocke_izpita'=>79]);

        //Ivanka Uhan v 2.letniku
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>31, 'ocena'=>10, 'tocke_izpita'=>93]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>34, 'ocena'=>9, 'tocke_izpita'=>83]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>37, 'ocena'=>9, 'tocke_izpita'=>85]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>42, 'ocena'=>9, 'tocke_izpita'=>80]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>43, 'ocena'=>9, 'tocke_izpita'=>88]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>46, 'ocena'=>10, 'tocke_izpita'=>92]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>49, 'ocena'=>10, 'tocke_izpita'=>97]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>52, 'ocena'=>10, 'tocke_izpita'=>96]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>55, 'ocena'=>10, 'tocke_izpita'=>94]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>142, 'ocena'=>10, 'tocke_izpita'=>94]);

        //Ivanka Uhan v 3.letniku
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>59, 'ocena'=>10, 'tocke_izpita'=>96]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>61, 'ocena'=>10, 'tocke_izpita'=>99]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>64, 'ocena'=>9, 'tocke_izpita'=>85]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>68, 'ocena'=>8, 'tocke_izpita'=>78]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>76, 'ocena'=>10, 'tocke_izpita'=>96]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>79, 'ocena'=>7, 'tocke_izpita'=>67]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>145, 'ocena'=>10, 'tocke_izpita'=>98]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>148, 'ocena'=>7, 'tocke_izpita'=>66]);
        DB::table('student_izpit')->insert(['id_studenta'=>9, 'id_izpitnega_roka'=>151, 'ocena'=>9, 'tocke_izpita'=>87]);

        //Neža Belej
        //1.letnik
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>82, 'ocena'=>8, 'tocke_izpita'=>74]);
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>85, 'ocena'=>7, 'tocke_izpita'=>12]);
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>88, 'ocena'=>9, 'tocke_izpita'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>91, 'ocena'=>6, 'tocke_izpita'=>58]);
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>94, 'ocena'=>7, 'tocke_izpita'=>29]);
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>97, 'ocena'=>9, 'tocke_izpita'=>25]);
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>100, 'ocena'=>9, 'tocke_izpita'=>24]);
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>103, 'ocena'=>9, 'tocke_izpita'=>38]);
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>106, 'ocena'=>4, 'tocke_izpita'=>34]);
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>107, 'ocena'=>5, 'tocke_izpita'=>40]);
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>108, 'ocena'=>5, 'tocke_izpita'=>48]);
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>109, 'ocena'=>8, 'tocke_izpita'=>74]);

        //2.letnik 1.semester
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>154, 'ocena'=>9, 'tocke_izpita'=>82]);
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>157, 'ocena'=>5, 'tocke_izpita'=>45]);
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>160, 'ocena'=>4, 'tocke_izpita'=>30]);
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>161, 'ocena'=>5, 'tocke_izpita'=>45]);
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>163, 'ocena'=>4, 'tocke_izpita'=>30]);
        DB::table('student_izpit')->insert(['id_studenta'=>1, 'id_izpitnega_roka'=>166, 'ocena'=>10, 'tocke_izpita'=>93]);


        //Miha dlan
        //1.letnik
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>82, 'ocena'=>8, 'tocke_izpita'=>74]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>85, 'ocena'=>7, 'tocke_izpita'=>12]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>88, 'ocena'=>7, 'tocke_izpita'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>91, 'ocena'=>6, 'tocke_izpita'=>58]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>94, 'ocena'=>7, 'tocke_izpita'=>29]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>97, 'ocena'=>9, 'tocke_izpita'=>25]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>100, 'ocena'=>7, 'tocke_izpita'=>15]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>103, 'ocena'=>8, 'tocke_izpita'=>38]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>106, 'ocena'=>6, 'tocke_izpita'=>20]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>109, 'ocena'=>6, 'tocke_izpita'=>74]);
        //2.letnik
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>154, 'ocena'=>8, 'tocke_izpita'=>74]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>157, 'ocena'=>7, 'tocke_izpita'=>12]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>160, 'ocena'=>7, 'tocke_izpita'=>10]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>163, 'ocena'=>6, 'tocke_izpita'=>58]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>166, 'ocena'=>7, 'tocke_izpita'=>29]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>169, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>172, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>175, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>178, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>16, 'id_izpitnega_roka'=>187, 'ocena'=>0, 'tocke_izpita'=>0]);

        //Rok Pogorelc
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>3, 'ocena'=>6, 'tocke_izpita'=>55]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>6, 'ocena'=>7, 'tocke_izpita'=>67]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>9, 'ocena'=>8, 'tocke_izpita'=>87]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>12, 'ocena'=>5, 'tocke_izpita'=>47]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>15, 'ocena'=>5, 'tocke_izpita'=>47]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>18, 'ocena'=>4, 'tocke_izpita'=>34]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>21, 'ocena'=>3, 'tocke_izpita'=>24]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>24, 'ocena'=>5, 'tocke_izpita'=>44]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>27, 'ocena'=>5, 'tocke_izpita'=>56]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>30, 'ocena'=>4, 'tocke_izpita'=>34]);

        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>91, 'ocena'=>5, 'tocke_izpita'=>47]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>94, 'ocena'=>5, 'tocke_izpita'=>41]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>95, 'ocena'=>5, 'tocke_izpita'=>45]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>96, 'ocena'=>5, 'tocke_izpita'=>47]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>200, 'ocena'=>5, 'tocke_izpita'=>49]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>99, 'ocena'=>5, 'tocke_izpita'=>47]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>102, 'ocena'=>5, 'tocke_izpita'=>47]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>105, 'ocena'=>5, 'tocke_izpita'=>47]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>108, 'ocena'=>5, 'tocke_izpita'=>47]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>111, 'ocena'=>5, 'tocke_izpita'=>47]);

        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>124, 'ocena'=>5, 'tocke_izpita'=>49]);
        DB::table('student_izpit')->insert(['id_studenta'=>17, 'id_izpitnega_roka'=>125, 'ocena'=>5, 'tocke_izpita'=>49]);


        //studenti od veronike
        DB::table('student_izpit')->insert(['id_studenta'=>19, 'id_izpitnega_roka'=>113, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>20, 'id_izpitnega_roka'=>113, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>21, 'id_izpitnega_roka'=>113, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>22, 'id_izpitnega_roka'=>113, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>23, 'id_izpitnega_roka'=>113, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>24, 'id_izpitnega_roka'=>113, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>25, 'id_izpitnega_roka'=>113, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>26, 'id_izpitnega_roka'=>113, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>27, 'id_izpitnega_roka'=>113, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>28, 'id_izpitnega_roka'=>113, 'ocena'=>0, 'tocke_izpita'=>0]);

        DB::table('student_izpit')->insert(['id_studenta'=>23, 'id_izpitnega_roka'=>112, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>24, 'id_izpitnega_roka'=>112, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>25, 'id_izpitnega_roka'=>112, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>26, 'id_izpitnega_roka'=>112, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>27, 'id_izpitnega_roka'=>112, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>28, 'id_izpitnega_roka'=>112, 'ocena'=>0, 'tocke_izpita'=>0]);

        DB::table('student_izpit')->insert(['id_studenta'=>19, 'id_izpitnega_roka'=>83, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>20, 'id_izpitnega_roka'=>83, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>21, 'id_izpitnega_roka'=>83, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>22, 'id_izpitnega_roka'=>83, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>23, 'id_izpitnega_roka'=>83, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>24, 'id_izpitnega_roka'=>83, 'ocena'=>0, 'tocke_izpita'=>0]);

        DB::table('student_izpit')->insert(['id_studenta'=>21, 'id_izpitnega_roka'=>82, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>22, 'id_izpitnega_roka'=>82, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>23, 'id_izpitnega_roka'=>82, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>24, 'id_izpitnega_roka'=>82, 'ocena'=>0, 'tocke_izpita'=>0]);

        DB::table('student_izpit')->insert(['id_studenta'=>20, 'id_izpitnega_roka'=>84, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>21, 'id_izpitnega_roka'=>84, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>22, 'id_izpitnega_roka'=>84, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>23, 'id_izpitnega_roka'=>84, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>24, 'id_izpitnega_roka'=>84, 'ocena'=>0, 'tocke_izpita'=>0]);

        DB::table('student_izpit')->insert(['id_studenta'=>19, 'id_izpitnega_roka'=>116, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>20, 'id_izpitnega_roka'=>116, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>21, 'id_izpitnega_roka'=>116, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>22, 'id_izpitnega_roka'=>116, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>23, 'id_izpitnega_roka'=>116, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>24, 'id_izpitnega_roka'=>116, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>25, 'id_izpitnega_roka'=>116, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>26, 'id_izpitnega_roka'=>116, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>27, 'id_izpitnega_roka'=>116, 'ocena'=>0, 'tocke_izpita'=>0]);
        DB::table('student_izpit')->insert(['id_studenta'=>28, 'id_izpitnega_roka'=>116, 'ocena'=>0, 'tocke_izpita'=>0]);

               //

    }

}