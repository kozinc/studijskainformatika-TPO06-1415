<?php namespace App\Http\Controllers;

class ListStudentsController extends Controller {

    public function __construct() {
        $this->middleware('guest');
    }

    public function get_all_students(){
        $predmeti = \App\Models\Predmet::lists('naziv', 'id');
        $leta = ["1" => "1. stopnja, 1. letnik", "2" => "1. stopnja, 2. letnik", "3" => "1. stopnja, 3. letnik", "4" => "2. stopnja, 1. letnik", "5" => "2. stopnja, 2. letnik"];
        return \View::make('seznam')->with('predmeti', $predmeti)->with('leta', $leta)->with('student_list', '')->with('predmet_id', 1);
    }

    function cmp($a, $b){
        return strcmp($a->priimek, $b->priimek);
    }

    public function getStudents(){
        $predmet_id = \Input::get('predmeti');

        $student_predmet_list = \App\Models\StudentPredmet::where('id_predmeta', $predmet_id)->get();
        $student_list = array();

        foreach ($student_predmet_list as $s) {
            $student_id = $s->id_studenta;
            $student = \App\Models\Student::find($student_id);
            array_push($student_list, $student);
        }

        usort($student_list, array($this, "cmp"));

        if($student_predmet_list -> count() == 0){
            $student_list = '';
        }

        $predmeti = \App\Models\Predmet::lists('naziv', 'id');
        $leta = ["1" => "1. stopnja, 1. letnik", "2" => "1. stopnja, 2. letnik", "3" => "1. stopnja, 3. letnik", "4" => "2. stopnja, 1. letnik", "5" => "2. stopnja, 2. letnik"];

        return \View::make('seznam')->with('student_list', $student_list)->with('predmeti', $predmeti)->with('leta', $leta)->with('predmet_id', $predmet_id);
    }
}