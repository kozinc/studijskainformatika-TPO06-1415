<?php namespace App\Http\Controllers;

use App\Helpers\ExportHelper;
use DB;
use App\Models\VrstaVpisa;
use App\Models\Modul;
use App\Models\PredmetNosilec;
use App\Models\Nosilec;
use App\Models\Predmet;
use App\Models\StudentProgram;
use App\Models\StudentPredmet;
use App\Models\Student;

class ListStudentsController extends Controller {

    public function __construct() {
        $this->middleware('guest');
    }

    public function get_all_students(){
        $predmeti = \App\Models\Predmet::orderBy('naziv', 'asc')->lists('naziv', 'id');
        $leta = array_unique(\App\Models\StudentPredmet::lists('studijsko_leto'));
        $leta = array_values($leta);
        $predmeti2 = array();
        foreach($predmeti as $p){
            $pr = \App\Models\Predmet::where('naziv', $p)->first();
            $p = $p . ' (' . $pr->sifra . ')';
           array_push($predmeti2, $p);
        }
        return \View::make('seznam')
            ->with('predmeti', $predmeti2)
            ->with('leta', $leta)
            ->with('student_list', '')
            ->with('predmet_id', 0)
            ->with('leto_id', 0);
    }

    public function getStudents(){
        //dobi predmetid
        $predmeti = \App\Models\Predmet::orderBy('naziv', 'asc')->lists('id');
        $p_id2 = \Input::get('predmeti');
        $predmet_id = $predmeti[$p_id2];
        //echo $predmet_id;

        //dobi string leto
        $leto_id = \Input::get('leta');
        $leta = array_unique(\App\Models\StudentPredmet::lists('studijsko_leto'));
        $leta = array_values($leta);
        $l = $leta[$leto_id];

        //studentje
        $student_predmet_list = \App\Models\StudentPredmet::where('id_predmeta', $predmet_id)->where('studijsko_leto', $l)->lists('id_studenta');
        $student_list = array();

        $c = 1;
        foreach ($student_predmet_list as $s) {
            $student = \App\Models\Student::find($s);
            $student['zaporedna'] = $c;
            $student['vrstavpisa'] = \App\Models\StudentProgram::where('id_studenta', $s)->where('studijsko_leto', $l)->pluck('vrsta_vpisa');
            array_push($student_list, $student);
            $c++;
        }

        usort($student_list, array($this, "cmp"));

        if(count($student_predmet_list) == 0){
            $student_list = '';
        }

        //
        $predmeti = \App\Models\Predmet::orderBy('naziv', 'asc')->lists('naziv', 'id');
        $leta = array_unique(\App\Models\StudentPredmet::lists('studijsko_leto'));
        $leta = array_values($leta);

        //dobi vse vrste vpisa
        $vrsteVpisa = VrstaVpisa::all()->keyBy('sifra');

        $predmeti2 = array();
        foreach($predmeti as $p){
            $pr = \App\Models\Predmet::where('naziv', $p)->first();
            $p = $p . ' (' . $pr->sifra . ')';
            array_push($predmeti2, $p);
        }

        $csv = \Input::get('csv');
        $pdf = \Input::get('pdf');
        if(!is_null($csv) || !is_null($pdf)){
            $export_content = [['Šifra','Vpisna številka','Ime','Ocena','Vrsta vpisa']];
            foreach($student_list as $s){
                $export_content[] = [$s->id, $s->vpisna, $s->ime.' '.$s->priimek, $s->ocena, $vrsteVpisa->get($s->vrstavpisa)->ime];
            }
            if(!is_null($pdf)){
                $predmet = \App\Models\Predmet::find($predmet_id);
                $pdf = \App::make('dompdf');
                $pdf->loadHTML(\View::make('pdf/seznam_vpisanih_v_predmet')->with('student_list', $student_list)->with('predmet', $predmet->naziv)->with('leto', $l)->with('vrsteVpisa',$vrsteVpisa));
                return $pdf->download('seznam.pdf');
            }else{
                ExportHelper::make_csv($export_content,'Seznam vpisanih');
            }
        }

        return \View::make('seznam')->with('student_list', $student_list)->with('predmeti', $predmeti2)->with('leta', $leta)->with('predmet_id', $p_id2)->with('leto_id', $leto_id)->with('vrsteVpisa',$vrsteVpisa);
    }

    ///////////////////////////////////////////////////////////////////////////////////////////

    public function cmp($a, $b){

        $a1 = substr($a->priimek, 0, 2);
        if(!($a1 == 'Č' || $a1 == 'Š' || $a1 == 'Ž')){
            $a1 = substr($a->priimek, 0, 1);
        }

        $b1 = substr($b->priimek, 0, 2);
        if(!($b1 == 'Č' || $b1 == 'Š' || $b1 == 'Ž')){
            $b1 = substr($b->priimek, 0, 1);
        }

        if($a1 == "Č"){
            if($b1 == "Š" || $b1 == "Ž"){
                return -1;
            }
            else if($b1 == "Č"){
                $asub = substr($a->priimek, 2);
                $bsub = substr($b->priimek, 2);
                return strcmp($asub, $bsub);
            }
            else if(strcmp("D", $b1) <= 0){
                return -1;
            }
            else if(strcmp("C", $b1) >= 0){
                return 1;
            }
        }
        else if($a1 == "Š"){
            if($b1 == "Č"){
                return 1;
            }
            else if($b1 == "Š"){
                $asub = substr($a->priimek, 2);
                $bsub = substr($b->priimek, 2);
                return strcmp($asub, $bsub);
            }
            else if($b1 == "Ž"){
                return -1;
            }
            else if(strcmp("T", $b1) <= 0){
                return -1;
            }
            else if(strcmp("S", $b1) >= 0){
                return 1;
            }
        }
        else if($a1 == "Ž"){
            if($b1 == "Č" || $b1 == "Š"){
                return 1;
            }
            else if($b1 == "Ž"){
                $asub = substr($a->priimek, 2);
                $bsub = substr($b->priimek, 2);
                return strcmp($asub, $bsub);
            }
            else if(strcmp("Z", $b1) >= 0){
                return 1;
            }
        }
        else if($b1 == "Č"){
            if($a1 == "Š" || $a1 == "Ž"){
                return 1;
            }
            else if($a1 == "Č"){
                $asub = substr($a->priimek, 2);
                $bsub = substr($b->priimek, 2);
                return strcmp($asub, $bsub);
            }
            else if(strcmp("C", $a1) >= 0){
                return -1;
            }
            else if(strcmp("D", $a1) <= 0){
                return 1;
            }
        }
        else if($b1 == "Š"){
            if($a1 == "Č"){
                return -1;
            }
            else if($a1 == "Š"){
                $asub = substr($a->priimek, 2);
                $bsub = substr($b->priimek, 2);
                return strcmp($asub, $bsub);
            }
            else if($a1 == "Ž"){
                return 1;
            }
            else if(strcmp("T", $a1) <= 0){
                return 1;
            }
            else if(strcmp("S", $a1) >= 0){
                return -1;
            }
        }
        else if($b1 == "Ž"){
            if($a1 == "Č" || $a1 == "Š"){
                return -1;
            }
            else if($a1 == "Ž"){
                $asub = substr($a->priimek, 2);
                $bsub = substr($b->priimek, 2);
                return strcmp($asub, $bsub);
            }
            else if(strcmp("Z", $a1) >= 0){
                return -1;
            }
        }

        return strcmp($a->priimek, $b->priimek);
    }

    public function getPotrdilo($id, $id_programa){

        $student =  \App\Models\Student::find($id);
        $student_program = \App\Models\StudentProgram::find($id_programa);
        $id_programa = $student_program->id_programa;
        $program = \App\Models\StudijskiProgram::find($id_programa);

        $danes = date('d.m.Y');
        $datum_rojstva = $student->datum_rojstva;
        $datum_rojstva = date("d.m.Y", strtotime($datum_rojstva));
        $pdf = \App::make('dompdf');
        $stevilo = 6;
        $view = \View::make('potrdiloVpis')
            ->with('date', $danes)
            ->with('stevilo', $stevilo)
            ->with('ime', $student->ime)
            ->with('priimek', $student->priimek)
            ->with('vpisna', $student->vpisna)
            ->with('datum_rojstva', $datum_rojstva)
            ->with('kraj_rojstva', $student->obcina_rojstva)
            ->with('letnik', $student_program->letnik)
            ->with('studijsko_leto', $student_program->studijsko_leto)
            ->with('vrsta_vpisa', $student_program->nacin_studija)
            ->with('program', $program->ime);
        $pdf->loadHTML($view);
        return $pdf->download('Potrdila o vpisu.pdf');
    }

    public function cmp2($a, $b){
        return strcmp($a, $b);
    }

    public function natisniVpisniList($id){

        $student = \App\Models\Student::find($id);
        $student_program = $student->studentProgram()->where('studijsko_leto', '2014/2015')->first();

        if($student_program == null) return redirect()->back();

        $prvi_vpis = $student->studentProgram()->where('id_programa', $student_program->id_programa)->lists('datum_vpisa');
        usort($prvi_vpis, array($this, "cmp2"));
        $prvi_vpis = $prvi_vpis[0];
        $program = \App\Models\StudijskiProgram::find($student_program->id_programa);
        $obvezni_predmeti = $program->predmeti()->where('tip', '=', 'obvezni')->where('letnik', '=', $student_program->letnik)->where('studijsko_leto', '2014/2015')->distinct();
        $izbirni_predmeti = \App\Models\StudentPredmet::where('id_studenta', $id)->where('studijsko_leto', '2014/2015')->lists('id_predmeta');
        $izbirni = array();
        $o_predmeti = array();

        $st_KT = 0;

        foreach($obvezni_predmeti->get() as $op){

            $program_predmet = \DB::table('program_predmet')->where('id_predmeta', $op->id)->where('studijsko_leto', '2014/2015')->first();
            $nosilec_id = $program_predmet->id_nosilca1;
            $nosilec = \App\Models\Nosilec::find($nosilec_id);
            $nosilci = $nosilec->ime . " " . $nosilec->priimek;
            if($program_predmet->id_nosilca2 > 0){
                $nosilec = \App\Models\Nosilec::find($program_predmet->id_nosilca2);
                $nosilci = $nosilci . ", " . $nosilec->ime . " " . $nosilec->priimek;
            }
            if($program_predmet->id_nosilca3 > 0){
                $nosilec = \App\Models\Nosilec::find($program_predmet->id_nosilca3);
                $nosilci = $nosilci . ", " . $nosilec->ime . " " . $nosilec->priimek;
            }

            $op['n'] = $nosilci;
            $st_KT += $op->KT;
            array_push($o_predmeti, $op);
        }

        foreach ($izbirni_predmeti as $i) {
            if (\DB::table('program_predmet')->where('id_predmeta', $i)->where('studijsko_leto', '2014/2015')->exists()) {
                $bla = \DB::table('program_predmet')->where('id_predmeta', $i)->where('studijsko_leto', '2014/2015')->first();
                if ($bla->tip == 'splošno-izbirni' || $bla->tip == 'strokovni-izbirni' || $bla->tip == 'modulski') {
                    $pred = \App\Models\Predmet::where('id', $i)->first();
                    $program_predmet = \DB::table('program_predmet')->where('id_predmeta', $op->id)->where('studijsko_leto', '2014/2015')->first();
                    $nosilec_id = $program_predmet->id_nosilca1;
                    $nosilec = \App\Models\Nosilec::find($nosilec_id);
                    $nosilci = $nosilec->ime . " " . $nosilec->priimek;
                    if($program_predmet->id_nosilca2 > 0){
                        $nosilec = \App\Models\Nosilec::find($program_predmet->id_nosilca2);
                        $nosilci = $nosilci . ", " . $nosilec->ime . " " . $nosilec->priimek;
                    }
                    if($program_predmet->id_nosilca3 > 0){
                        $nosilec = \App\Models\Nosilec::find($program_predmet->id_nosilca3);
                        $nosilci = $nosilci . ", " . $nosilec->ime . " " . $nosilec->priimek;
                    }
                    $st_KT += $pred->KT;
                    $pred['n'] = $nosilci;
                    array_push($izbirni, $pred);
                }
            }
        }

        ini_set('max_execution_time', 300);
        $pdf = \App::make('dompdf');
        $pdf->loadHTML(\View::make('pdf/vpisni_list_pdf')->with('student', $student)->with('program', $program)->with('studijsko_leto', '2014/2015')->with('program_student', $student_program)->with('obvezni_predmeti', $o_predmeti)->with('prvi_vpis', $prvi_vpis)->with('izbirni', $izbirni)->with('skupne_KT', $st_KT));
        return $pdf->download('vpisni_list.pdf');

        //return \View::make('pdf/vpisni_list_pdf')->with('student', $student)->with('program', $program)->with('studijsko_leto', '2014/2015')->with('program_student', $student_program)->with('obvezni_predmeti', $o_predmeti)->with('prvi_vpis', $prvi_vpis)->with('izbirni', $izbirni);

    }

    public function returnBack(){
        return view('student/iskanjeStudenta');
    }

    public function getAdvSeznam(){
        //$predmeti = \App\Models\Predmet::orderBy('naziv', 'asc')->lists('naziv', 'id');
        //{!! Form::select('predmeti', $predmeti, $predmet_id, array('class' => 'btn btn-default dropdown-toggle')) !!}

        // Iskanje v tabeli student_program
        /* student          --  id_studenta
                Po kriterijih:
         * studijsko leto       studijsko_leto
         * letnik               letnik
         * studijski program    id_programa
         * vrsta vpisa          vrsta_vpisa
         * način študija        nacin_studija
        */
        //$predmeti = \App\Models\Predmet::orderBy('naziv', 'asc')->lists('naziv', 'id');
        $anyOption = array("0" => "Ne glede");
        //dobi string leto      $leto_id            $leta               $leto
        $leto_id = 0;
        $leta2= array_unique(\App\Models\StudentProgram::lists('studijsko_leto'));
        $leta = array_merge($anyOption,$leta2);
        $leta = array_values($leta);
        $leto = $leta[$leto_id];
        //var_dump($leto);
        //letnik               $letnik_id           $letniki            $letnik
        $letnik_id = 0;
        $letniki2 = array_unique(\App\Models\StudentProgram::lists('letnik'));
        $letniki = array_merge($anyOption,$letniki2);
        $letniki = array_values($letniki);
        $letnik = $letniki[$letnik_id];
        //studijski program    $id_programa         $studProgrami       $studProgram
        $id_programa = 0;
        $studProgrami2 = array_unique(\App\Models\StudijskiProgram::lists('ime'));
        $studProgrami = array_merge($anyOption,$studProgrami2);
        $studProgrami = array_values($studProgrami);
        $studProgram = $studProgrami[$id_programa];
        //Vrsta Vpisa        $vrsteVpisa_id         $vrsteVpisa         $vrstaVpisa
        $vrsteVpisa_id = 0;
        $vrsteVpisa2= array_unique(\App\Models\VrstaVpisa::lists('ime'));
        $vrsteVpisa = array_merge($anyOption,$vrsteVpisa2);
        $vrsteVpisa = array_values($vrsteVpisa);
        $vrstaVpisa = $vrsteVpisa[$vrsteVpisa_id];
        //nacin_studija      $nacinStudija_id       $naciniStudija      $nacinStudija
        $nacinStudija_id = 0;
        $naciniStudija2= array_unique(\App\Models\StudentProgram::lists('nacin_studija'));
        $naciniStudija = array_merge($anyOption,$naciniStudija2);
        $naciniStudija = array_values($naciniStudija);
        $nacinStudija  = $naciniStudija[$nacinStudija_id];

        //return \View::make('advseznam')                              ->with('leta', $leta)->with('student_list', '')                       ->with('leto_id', 0);
        //                             ->with('predmeti', $predmeti2)                                               ->with('predmet_id', 1)
        return \View::make('advseznam')
            // leto
            ->with('leta', $leta)
            ->with('leto_id', 0)
            // letnik
            ->with('letniki', $letniki)
            ->with('letnik_id', 0)
            // stud program
            ->with('studProgrami', $studProgrami)
            ->with('id_programa', 0)
            // vrsta vpisa
            ->with('vrsteVpisa', $vrsteVpisa)
            ->with('vrsteVpisa_id', 0)
            // nacin studija
            ->with('naciniStudija', $naciniStudija)
            ->with('nacinStudija_id', 0)

            ->with('student_list', '');

    }

    public function getAdvStudents(){
        $anyOption = array("0" => "Ne glede");
        //dobi string leto      $leto_id            $leta               $leto
        $leto_id = \Input::get('leta');
        $leta2= array_unique(\App\Models\StudentProgram::lists('studijsko_leto'));
        $leta = array_merge($anyOption,$leta2);
        $leta = array_values($leta);
        $leto = $leta[$leto_id];
        //letnik               $letnik_id           $letniki            $letnik
        $letnik_id = \Input::get('letniki');
        $letniki2 = array_unique(\App\Models\StudentProgram::lists('letnik'));
        $letniki = array_merge($anyOption,$letniki2);
        $letniki = array_values($letniki);
        $letnik = $letniki[$letnik_id];
        //studijski program    $id_programa         $studProgrami       $studProgram
        $id_programa = \Input::get('studProgrami');
        $studProgrami2 = array_unique(\App\Models\StudijskiProgram::lists('ime'));
        $studProgrami = array_merge($anyOption,$studProgrami2);
        $studProgrami = array_values($studProgrami);
        $studProgram = $studProgrami[$id_programa];
        //Vrsta Vpisa        $vrsteVpisa_id         $vrsteVpisa         $vrstaVpisa
        $vrsteVpisa_id = \Input::get('vrsteVpisa');
        $vrsteVpisa2= array_unique(\App\Models\VrstaVpisa::lists('ime'));
        $vrsteVpisa = array_merge($anyOption,$vrsteVpisa2);
        $vrsteVpisa = array_values($vrsteVpisa);
        $vrstaVpisa = $vrsteVpisa[$vrsteVpisa_id];
        //nacin_studija      $nacinStudija_id       $naciniStudija      $nacinStudija
        $nacinStudija_id = \Input::get('naciniStudija');
        $naciniStudija2= array_unique(\App\Models\StudentProgram::orderBy('nacin_studija', 'asc')->lists('nacin_studija'));
        $naciniStudija = array_merge($anyOption,$naciniStudija2);
        $naciniStudija = array_values($naciniStudija);
        $nacinStudija  = $naciniStudija[$nacinStudija_id];
        //var_dump($leto);
        //var_dump($letnik);
        //var_dump($studProgram); v bazi -> id_programa
        //var_dump($vrstaVpisa); v bazi -> vrstevpisa_id
        //var_dump($nacinStudija);
        $student_list = '';
        /////////////////////////////

        //$query = StudentProgram::where('id','>',0);
        /*$query = DB::table('student_program');
        if($leto != 0 && !is_null($leto) )
            {$query = $query->where('studijsko_leto', '=',$leto);}

        $student_predmet_list = $query->get();
*/



        $query = StudentProgram::query();
        if ($leto_id>0 )
            { $query->where('studijsko_leto', $leto); }
        if ($letnik_id>0 )
            { $query->where('letnik', $letnik); }
        if ($id_programa>0 )
            { $query->where('id_programa', $id_programa); }
        if ($vrsteVpisa_id>0 )
            { $query->where('vrsta_vpisa', $vrsteVpisa_id); }
        if ($nacinStudija_id>0 )
            { $query->where('nacin_studija', $nacinStudija); }

        $student_predmet_list = $query->lists('id_studenta');

        //var_dump($student_predmet_list);
        //var_dump(count($student_predmet_list));
        //var_dump();



        $student_list = array();


/*
            $student['vrstavpisa']
                = \App\Models\StudentProgram::where('id_studenta', $s)
                ->where('studijsko_leto', $l)
                ->pluck('vrsta_vpisa');
*/



        $c = 1;
        foreach ($student_predmet_list as $s) {
            $student = \App\Models\Student::find($s);
            $student['zaporedna'] = $c;
            $student['vrstavpisa']
                = \App\Models\StudentProgram::where('id_studenta', $s)
                ->where('studijsko_leto', $leto)
                ->pluck('vrsta_vpisa');
            //var_dump($student['vrstavpisa']);
            //$leto_id  $letnik_id      $id_programa        $vrsteVpisa_id      $nacinStudija_id
            if($leto_id > 0){
                if($letnik_id > 0){
                    if($id_programa > 0){
                        if($vrsteVpisa_id > 0){
                            if($nacinStudija_id > 0){
                                /*
                                 * $leto_id
                                 * $letnik_id
                                 * $id_programa
                                 * $vrsteVpisa_id
                                 * $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                        ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                            else{
                                /*
                                 * $leto_id
                                 * $letnik_id
                                 * $id_programa
                                 * $vrsteVpisa_id
                                   $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                        }
                        else{
                            if($nacinStudija_id > 0){
                                /*
                                 * $leto_id
                                 * $letnik_id
                                 * $id_programa
                                   $vrsteVpisa_id
                                 * $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                            else{
                                /*
                                 * $leto_id
                                 * $letnik_id
                                 * $id_programa
                                   $vrsteVpisa_id
                                   $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                        }
                    }
                    else{
                        if($vrsteVpisa_id > 0){
                            if($nacinStudija_id > 0){
                                /*
                                 * $leto_id
                                 * $letnik_id
                                   $id_programa
                                 * $vrsteVpisa_id
                                 * $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                            else{
                                /*
                                 * $leto_id
                                 * $letnik_id
                                   $id_programa
                                 * $vrsteVpisa_id
                                   $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                        }
                        else{
                            if($nacinStudija_id > 0){
                                /*
                                 * $leto_id
                                 * $letnik_id
                                   $id_programa
                                   $vrsteVpisa_id
                                 * $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                            else{
                                /*
                                 * $leto_id
                                 * $letnik_id
                                   $id_programa
                                   $vrsteVpisa_id
                                   $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                        }
                    }
                }
                else{
                    if($id_programa > 0){
                        if($vrsteVpisa_id > 0){
                            if($nacinStudija_id > 0){
                                /*
                                 * $leto_id
                                   $letnik_id
                                 * $id_programa
                                 * $vrsteVpisa_id
                                 * $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                            else{
                                /*
                                 * $leto_id
                                   $letnik_id
                                 * $id_programa
                                 * $vrsteVpisa_id
                                   $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                        }
                        else{
                            if($nacinStudija_id > 0){
                                /*
                                 * $leto_id
                                   $letnik_id
                                 * $id_programa
                                   $vrsteVpisa_id
                                 * $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                            else{
                                /*
                                 * $leto_id
                                   $letnik_id
                                 * $id_programa
                                   $vrsteVpisa_id
                                   $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                        }
                    }
                    else{
                        if($vrsteVpisa_id > 0){
                            if($nacinStudija_id > 0){
                                /*
                                 * $leto_id
                                   $letnik_id
                                   $id_programa
                                 * $vrsteVpisa_id
                                 * $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                            else{
                                /*
                                 * $leto_id
                                   $letnik_id
                                   $id_programa
                                 * $vrsteVpisa_id
                                   $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                        }
                        else{
                            if($nacinStudija_id > 0){
                                /*
                                 * $leto_id
                                   $letnik_id
                                   $id_programa
                                   $vrsteVpisa_id
                                 * $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                            else{
                                /*
                                 * $leto_id
                                   $letnik_id
                                   $id_programa
                                   $vrsteVpisa_id
                                   $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    ->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                        }
                    }
                }
            }
            else{
                if($letnik_id > 0){
                    if($id_programa > 0){
                        if($vrsteVpisa_id > 0){
                            if($nacinStudija_id > 0){
                                /*
                                   $leto_id
                                 * $letnik_id
                                 * $id_programa
                                 * $vrsteVpisa_id
                                 * $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                            else{
                                /*
                                   $leto_id
                                 * $letnik_id
                                 * $id_programa
                                 * $vrsteVpisa_id
                                   $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                        }
                        else{
                            if($nacinStudija_id > 0){
                                /*
                                   $leto_id
                                 * $letnik_id
                                 * $id_programa
                                   $vrsteVpisa_id
                                 * $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                            else{
                                /*
                                   $leto_id
                                 * $letnik_id
                                 * $id_programa
                                   $vrsteVpisa_id
                                   $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                        }
                    }
                    else{
                        if($vrsteVpisa_id > 0){
                            if($nacinStudija_id > 0){
                                /*
                                   $leto_id
                                 * $letnik_id
                                   $id_programa
                                 * $vrsteVpisa_id
                                 * $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                            else{
                                /*
                                   $leto_id
                                 * $letnik_id
                                   $id_programa
                                 * $vrsteVpisa_id
                                   $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                        }
                        else{
                            if($nacinStudija_id > 0){
                                /*
                                   $leto_id
                                 * $letnik_id
                                   $id_programa
                                   $vrsteVpisa_id
                                 * $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                            else{
                                /*
                                   $leto_id
                                 * $letnik_id
                                   $id_programa
                                   $vrsteVpisa_id
                                   $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    ->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                        }
                    }
                }
                else{
                    if($id_programa > 0){
                        if($vrsteVpisa_id > 0){
                            if($nacinStudija_id > 0){
                                /*
                                   $leto_id
                                   $letnik_id
                                 * $id_programa
                                 * $vrsteVpisa_id
                                 * $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                            else{
                                /*
                                   $leto_id
                                   $letnik_id
                                 * $id_programa
                                 * $vrsteVpisa_id
                                   $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                        }
                        else{
                            if($nacinStudija_id > 0){
                                /*
                                   $leto_id
                                   $letnik_id
                                 * $id_programa
                                   $vrsteVpisa_id
                                 * $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                            else{
                                /*
                                   $leto_id
                                   $letnik_id
                                 * $id_programa
                                   $vrsteVpisa_id
                                   $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    ->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                        }
                    }
                    else{
                        if($vrsteVpisa_id > 0){
                            if($nacinStudija_id > 0){
                                /*
                                   $leto_id
                                   $letnik_id
                                   $id_programa
                                 * $vrsteVpisa_id
                                 * $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                            else{
                                /*
                                   $leto_id
                                   $letnik_id
                                   $id_programa
                                 * $vrsteVpisa_id
                                  $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    ->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                        }
                        else{
                            if($nacinStudija_id > 0){
                                /*
                                   $leto_id
                                   $letnik_id
                                   $id_programa
                                   $vrsteVpisa_id
                                 * $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    ->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                            else{
                                /*
                                   $leto_id
                                   $letnik_id
                                   $id_programa
                                   $vrsteVpisa_id
                                   $nacinStudija_id
                                 * */
                                $student['vrstavpisa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('vrsta_vpisa');
                                $student['nacinstudija']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('nacin_studija');
                                $student['letnik']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsta_vpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('letnik');
                                $student['studijsko_leto']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('studijsko_leto');
                                $student['id_programa']
                                    = \App\Models\StudentProgram::where('id_studenta', $s)
                                    //->where('studijsko_leto', $leto)
                                    //->where('letnik',$letnik_id)
                                    //->where('id_programa',$id_programa)
                                    //->where('vrsteVpisa',$vrsteVpisa_id)
                                    //->where('nacin_studija',$nacinStudija)
                                    ->pluck('id_programa');
                            }
                        }
                    }
                }
            }

            /*$student['vrstavpisa'] = \App\Models\StudentProgram::
                where('id_studenta', $s->id_studenta)
                ->where('studijsko_leto', $leto)
                ->pluck('vrsta_vpisa');*/



            array_push($student_list, $student);
            $c++;
        }
        //var_dump($student_list);

        usort($student_list, array($this, "cmp"));

        if(count($student_predmet_list) == 0){
            $student_list = '';
        }

        /////////////////////////////
        $csv = \Input::get('csv');
        $pdf = \Input::get('pdf');
        if(!is_null($csv) || !is_null($pdf)){
            $export_content = [['Zaporedna številka','Vpisna številka','Priimek in ime','Študijsko leto','Letnik','Vrsta vpisa','Način vpisa']];
            foreach($student_list as $s){
                $export_content[] = [$s->zaporedna, $s->vpisna, $s->priimek.' '.$s->ime, $s->studijsko_leto, $s->letnik, $vrsteVpisa[$s->vrstavpisa],$s->nacinstudija];
            }
            if(!is_null($pdf)){
                //$predmet = \App\Models\Predmet::find($predmet_id);

                //return $pdf->download('vpisni_list.pdf');
                /*return view('pdf/adv_seznam_studentov',
                    [   'student_list'=>$student_list,
                        'leta'=>$leta,
                        'leto_id'=>$leto_id,
                        'letniki'=>$letniki,
                        'letnik_id'=>$letnik_id,
                        'studProgrami'=>$studProgrami,
                        'id_programa'=>$id_programa,
                        'vrsteVpisa'=>$vrsteVpisa,
                        'vrsteVpisa_id'=>$vrsteVpisa_id,
                        'naciniStudija'=>$naciniStudija,
                        'nacinStudija_id'=>$nacinStudija_id
                    ]);*/

                $pdf = \App::make('dompdf');
                $pdf->loadHTML(\View::make('pdf/adv_seznam_studentov')
                    ->with('student_list', $student_list)
                    ->with('leta', $leta)
                    ->with('leto_id', $leto_id)
                    ->with('letniki', $letniki)
                    ->with('letnik_id', $letnik_id)
                    ->with('studProgrami', $studProgrami)
                    ->with('id_programa', $id_programa)
                    ->with('vrsteVpisa', $vrsteVpisa)
                    ->with('vrsteVpisa_id', $vrsteVpisa_id)
                    ->with('naciniStudija', $naciniStudija)
                    ->with('nacinStudija_id', $nacinStudija_id));
                return $pdf->download('advseznam.pdf');
            }else{
                ExportHelper::make_csv($export_content,'Seznam študentov');
            }
        }
        //var_dump($student_list);
        /////////////////////////////


        return \View::make('advseznam')
            // leto
            ->with('leta', $leta)
            ->with('leto_id', $leto_id)
            // letnik
            ->with('letniki', $letniki)
            ->with('letnik_id', $letnik_id)
            // stud program
            ->with('studProgrami', $studProgrami)
            ->with('id_programa', $id_programa)
            // vrsta vpisa
            ->with('vrsteVpisa', $vrsteVpisa)
            ->with('vrsteVpisa_id', $vrsteVpisa_id)
            // nacin studija
            ->with('naciniStudija', $naciniStudija)
            ->with('nacinStudija_id', $nacinStudija_id)

            ->with('student_list', $student_list);


    }

}