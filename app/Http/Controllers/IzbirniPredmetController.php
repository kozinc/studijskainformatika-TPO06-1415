<?php namespace App\Http\Controllers;

class IzbirniPredmetController extends Controller {

    public function getIzbirniPredmetRef(){

        $id_studenta = 4;

        $student = \App\Models\Student::find($id_studenta);
        $studentProgram = $student->studentProgram()->where('studijsko_leto', '2014/2015')->first();
        $program = \App\Models\StudijskiProgram::find($studentProgram->id_programa);
        $letnik = $studentProgram->letnik;

        $prostoIzbirniPredmetiList = \DB::table('program_predmet')->where('letnik', $letnik)->where('tip', 'splošno-izbirni')->lists('id_predmeta');
        $prostoIzbirniPredmeti = array();

        foreach ($prostoIzbirniPredmetiList as $predmet_id) {
            $predmet = \App\Models\Predmet::find($predmet_id);
            array_push($prostoIzbirniPredmeti, $predmet->naziv);
        }

        $student_obvestilo = $student->ime." ".$student->priimek." (".$letnik.". letnik)";

        //3. letnik BUN-RI - moduli
        if($letnik == 3 && $studentProgram->id_programa == 1 && $studentProgram->prosta_izbira == 0){
            $moduli = \App\Models\Modul::where('studijsko_leto', '2014/2015')->lists('ime');
        }



        return \View::make('izbirni_predmeti/izbirni_predmet_ref')->with('moduli', $moduli)->with('prosto_izbirni', $prostoIzbirniPredmeti)->with('modul1_id', 1)->with('modul2_id', 0)->with('opis', $student_obvestilo);
    }

    public function spremeniIzbirnePredmete(){
        return \View::make('izbirni_predmeti/izbirni_predmet_ref');
    }

}