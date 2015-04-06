<?php namespace App\Http\Controllers;

class ListStudentsController extends Controller {

    public function __construct() {
        $this->middleware('guest');
    }

    public function get_all_students(){
        $predmeti = \App\Models\Predmet::lists('naziv', 'id');
        $leta = array_unique(\App\Models\StudentPredmet::lists('studijsko_leto'));
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
        $leto = $leta[$leto_id];

        $student_predmet_list = \App\Models\StudentPredmet::where('id_predmeta', $predmet_id)->where('studijsko_leto', $leto)->get();
        $student_list = array();

        foreach ($student_predmet_list as $s) {
            $student_id = $s->id_studenta;
            $student = \App\Models\Student::find($student_id);
            $student['vrstavpisa'] = \App\Models\StudentProgram::where('id_studenta', $student_id)->pluck('vrsta_vpisa');
            array_push($student_list, $student);
        }

        usort($student_list, array($this, "cmp"));

        if($student_predmet_list -> count() == 0){
            $student_list = '';
        }

        $predmeti = \App\Models\Predmet::lists('naziv', 'id');
        $leta = array_unique(\App\Models\StudentPredmet::lists('studijsko_leto'));

        return \View::make('seznam')->with('student_list', $student_list)->with('predmeti', $predmeti)->with('leta', $leta)->with('predmet_id', $predmet_id)->with('predmet_id', $predmet_id)->with('leto_id', $leto_id);
    }
}