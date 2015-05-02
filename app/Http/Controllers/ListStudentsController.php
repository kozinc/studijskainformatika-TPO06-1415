<?php namespace App\Http\Controllers;

use App\Helpers\ExportHelper;
use App\Models\VrstaVpisa;

class ListStudentsController extends Controller {

    public function __construct() {
        $this->middleware('guest');
    }

    public function get_all_students(){
        $predmeti = \App\Models\Predmet::lists('naziv', 'id');
        $leta = array_unique(\App\Models\StudentPredmet::lists('studijsko_leto'));
        $leta = array_values($leta);
        return \View::make('seznam')->with('predmeti', $predmeti)->with('leta', $leta)->with('student_list', '')->with('predmet_id', 1)->with('leto_id', 0);
    }

    function cmp($a, $b){

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

    public function getStudents(){
        $predmet_id = \Input::get('predmeti');
        $leto_id = \Input::get('leta');
        $leta = array_unique(\App\Models\StudentPredmet::lists('studijsko_leto'));
        $leta = array_values($leta);

        $l = $leta[$leto_id];

        $student_predmet_list = \App\Models\StudentPredmet::where('id_predmeta', $predmet_id)->where('studijsko_leto', $l)->get();
        $student_list = array();

        foreach ($student_predmet_list as $s) {
            $student_id = $s->id_studenta;
            $student = \App\Models\Student::find($student_id);
            $student['vrstavpisa'] = \App\Models\StudentProgram::where('id_studenta', $student_id)->pluck('vrsta_vpisa');
            $student['ocena'] = $s->ocena;
            array_push($student_list, $student);
        }

        usort($student_list, array($this, "cmp"));

        if($student_predmet_list -> count() == 0){
            $student_list = '';
        }

        $predmeti = \App\Models\Predmet::lists('naziv', 'id');
        $leta = array_unique(\App\Models\StudentPredmet::lists('studijsko_leto'));
        $leta = array_values($leta);
        $vrsteVpisa = VrstaVpisa::all()->keyBy('sifra');

        $csv = \Input::get('csv');
        $pdf = \Input::get('pdf');
        if(!is_null($csv) || !is_null($pdf)){
            $export_content = [['Šifra','Vpisna številka','Ime','Ocena','Vrsta vpisa']];
            foreach($student_list as $s){
                $export_content[] = [$s->id, $s->vpisna, $s->ime.' '.$s->priimek, $s->ocena, $vrsteVpisa->get($s->vrstavpisa)->ime];
            }
            if(!is_null($pdf)){
                return ExportHelper::make_pdf($export_content,'Seznam vpisanih');
            }else{
                ExportHelper::make_csv($export_content,'Seznam vpisanih');
            }
        }

        return \View::make('seznam')->with('student_list', $student_list)->with('predmeti', $predmeti)->with('leta', $leta)->with('predmet_id', $predmet_id)->with('predmet_id', $predmet_id)->with('leto_id', $leto_id)->with('vrsteVpisa',$vrsteVpisa);
    }

    public function getPotrdilo($id){

        $student =  \App\Models\Student::find($id);
        $student_program = \App\Models\StudentProgram::where('id_studenta', $id)->first();
        $id_programa = $student_program->id_programa;
        $program = \App\Models\StudijskiProgram::where('id', $id_programa)->first();

        $danes = date('d.m.Y');
        $datum_rojstva = $student->datum_rojstva;
        $datum_rojstva = date("d.m.Y", strtotime($datum_rojstva));

        $pdf = \App::make('dompdf');
        $pdf->loadHTML(\View::make('potrdiloVpis')->with('date', $danes)->with('ime', $student->ime)->with('priimek', $student->priimek)->with('vpisna', $student->vpisna)->with('datum_rojstva', $datum_rojstva)->with('kraj_rojstva', $student->obcina_rojstva)->with('letnik', $student_program->letnik)->with('studijsko_leto', $student_program->studijsko_leto)->with('vrsta_vpisa', $student_program->nacin_studija)->with('program', $program->ime));
        return $pdf->download('my.pdf');
    }

    public function natisniVpisniList($id){
        $student = \App\Models\Student::find($id);
        $student_program = $student->studentProgram()->first();
        $program = \App\Models\StudijskiProgram::find($student_program->id_programa);
        $obvezni_predmeti =  $program->predmeti()->where('tip','=','obvezni')->where('letnik','=',$student_program->letnik);

        ini_set('max_execution_time', 300);
        $pdf = \App::make('dompdf');
        $pdf->loadHTML(\View::make('pdf/vpisni_list_pdf')->with('student', $student)->with('program', $program)->with('program_student', $student_program)->with('obvezni_predmeti', $obvezni_predmeti));
        return $pdf->download('vpisni_list.pdf');

        //return \View::make('pdf/vpisni_list_pdf')->with('student', $student)->with('program', $program)->with('program_student', $student_program)->with('obvezni_predmeti', $obvezni_predmeti);
    }

    public function returnBack(){
        return view('student/iskanjeStudenta');
    }
}