<?php namespace App\Http\Controllers;

class IzbirniPredmetController extends Controller {

    public function getIzbirniPredmetRef(){

        \Session::set('izbirni_predmet_info', '');

        $id_studenta = 4;
        $studijsko_leto = "2014/2015";

        $student = \App\Models\Student::find($id_studenta);
        $studentProgram = $student->studentProgram()->where('studijsko_leto', $studijsko_leto)->first();
        $program = \App\Models\StudijskiProgram::find($studentProgram->id_programa);
        $letnik = $studentProgram->letnik;

        $programLetnik = \App\Models\ProgramLetnik::where('letnik', $letnik)->where('id_programa', $studentProgram->id_programa)->first();
        $no_prosto = $programLetnik->stevilo_prostih_predmetov;
        $no_strokovno = $programLetnik->stevilo_strokovnih_predmetov;
        $no_modul = $programLetnik->stevilo_modulov;

        //seznam predmetov v tem letniku, ki jih ima ta študent
        $predmeti = \App\Models\StudentPredmet::where('id_studenta', $id_studenta)->where('studijsko_leto', $studijsko_leto)->lists('id_predmeta');
        $izbrani_moduli = array();
        $izbrani_prosti = array();
        $izbrani_strokovni = array();
        foreach($predmeti as $predmet_id){
            $predmet = \App\Models\Predmet::find($predmet_id);
        }

        //prosto izbirni predmeti
        $prostoIzbirniPredmeti = self::getProstoizbirnePredmete($studijsko_leto, $letnik);

        //strokovno izbirni prredmeti
        $strokovnoIzbirniPredmeti = self::getStrokovnoizbirnePredmete($studijsko_leto, $letnik);

        //modulski predmeti (za povprecje nad x)
        $modulskiIzbirniPredmeti = self::getModulskePredmete($studijsko_leto, $letnik);

        //prosto izbirni so tudi modulski in strokovni
        $prostoIzbirniPredmeti = array_merge($prostoIzbirniPredmeti, $strokovnoIzbirniPredmeti, $modulskiIzbirniPredmeti);
        array_unshift($prostoIzbirniPredmeti, 'Ni izbranega predmeta');

        $student_obvestilo = $student->vpisna." - ".$student->ime." ".$student->priimek." (".$letnik.". letnik ".$program->oznaka.")";

        //modulski sklopi
        if($letnik == 3 && $studentProgram->id_programa == 1 && $studentProgram->prosta_izbira == 0){
            $moduli = \App\Models\Modul::where('studijsko_leto', '2014/2015')->lists('ime');
        }
        else $moduli = "";

        return \View::make('izbirni_predmeti/izbirni_predmet_ref')->with('moduli', $moduli)->with('modulski', $modulskiIzbirniPredmeti)->with('strokovno_izbirni', $strokovnoIzbirniPredmeti)->with('prosto_izbirni', $prostoIzbirniPredmeti)
            ->with('st_modulov', $no_modul)->with('st_strokovno', $no_strokovno)->with('st_prosto', $no_prosto)->with('opis', $student_obvestilo)->with('prosta_izbira_modulskih_predmetov', $studentProgram->prosta_izbira);
    }

    public function getModulskePredmete($studijsko_leto, $letnik){
        $modulskiPredmetiList = \DB::table('program_predmet')->where('letnik', $letnik)->where('studijsko_leto', $studijsko_leto)->where('tip', 'modulski')->lists('id_predmeta');
        $modulskiIzbirniPredmeti = array();
        foreach ($modulskiPredmetiList as $predmet_id) {
            $predmet = \App\Models\Predmet::find($predmet_id);
            array_push($modulskiIzbirniPredmeti, $predmet->naziv." (".$predmet->KT." KT)");
        }
        return $modulskiIzbirniPredmeti;
    }

    public function getProstoizbirnePredmete($studijsko_leto, $letnik){
        $prostoIzbirniPredmetiList = \DB::table('program_predmet')->where('letnik', $letnik)->where('tip', 'splošno-izbirni')->lists('id_predmeta');
        $prostoIzbirniPredmeti = array();
        foreach ($prostoIzbirniPredmetiList as $predmet_id) {
            $predmet = \App\Models\Predmet::find($predmet_id);
            array_push($prostoIzbirniPredmeti, $predmet->naziv." (".$predmet->KT." KT)");
        }
        return $prostoIzbirniPredmeti;
    }

    public function getStrokovnoizbirnePredmete($studijsko_leto, $letnik){
        $strokovnoIzbirniPredmetiList = \DB::table('program_predmet')->where('letnik', $letnik)->where('tip', 'strokovni-izbirni')->lists('id_predmeta');
        $strokovnoIzbirniPredmeti = array();
        foreach ($strokovnoIzbirniPredmetiList as $predmet_id) {
            $predmet = \App\Models\Predmet::find($predmet_id);
            array_push($strokovnoIzbirniPredmeti, $predmet->naziv." (".$predmet->KT." KT)");
        }
        return $strokovnoIzbirniPredmeti;
    }

    /*******************************************************/

    public function spremeniIzbirnePredmete(){

        $id_studenta = 4;
        $studijsko_leto = "2014/2015";

        $student = \App\Models\Student::find($id_studenta);
        $studentProgram = $student->studentProgram()->where('studijsko_leto', $studijsko_leto)->first();
        $program = \App\Models\StudijskiProgram::find($studentProgram->id_programa);
        $letnik = $studentProgram->letnik;

        $programLetnik = \App\Models\ProgramLetnik::where('letnik', $letnik)->where('id_programa', $studentProgram->id_programa)->first();
        $no_prosto = $programLetnik->stevilo_prostih_predmetov;
        $no_strokovno = $programLetnik->stevilo_strokovnih_predmetov;
        $no_modul = $programLetnik->stevilo_modulov;

        $input = \Input::all();

        \DB::beginTransaction();

        //vsi predmeti studenta v tem letu
        $predmeti = \DB::table('student_predmet')->where('id_studenta', $id_studenta)->where('studijsko_leto', $studijsko_leto)->lists('id_predmeta');
        //zbrisi vse obstojece izbirne predmete, da lahko dolocis nove
        foreach($predmeti as $predmet_id){
            $p = \DB::table('program_predmet')->where('id_predmeta', $predmet_id)->where('id_predmeta', $predmet_id)->where('studijsko_leto', $studijsko_leto)->first();
            if(($p->tip == 'strokovni-izbirni') || ($p->tip == 'splošno-izbirni') || ($p->tip == 'modulski')){
                \DB::table('student_predmet')->where('id_studenta', $id_studenta)->where('studijsko_leto', $studijsko_leto)->where('id_predmeta', $predmet_id)->delete();
            }
        }

        $moduli = \App\Models\Modul::where('studijsko_leto', $studijsko_leto)->lists('ime');
        $modulskiPredmeti = self::getModulskePredmete($studijsko_leto, $letnik);
        $prostoizbirniPredmeti = self::getProstoizbirnePredmete($studijsko_leto, $letnik);
        $strokovnoizbirniPredmeti = self::getStrokovnoizbirnePredmete($studijsko_leto, $letnik);
        $prostoizbirniPredmeti = array_merge($prostoizbirniPredmeti, $strokovnoizbirniPredmeti, $modulskiPredmeti);
        array_unshift($prostoizbirniPredmeti, 'Ni izbranega predmeta');

        $counter = 1;
        $mode = 0;
        $first = true;
        $error = 0;
        $vsotaKT = 0;

        //analiziraj form, shrani izbrane predmete
        foreach($input as $i){

            if($first != true){
                //shrani modulske predmete
                if($counter <= $no_modul && $mode == 0){
                    $modul = \App\Models\Modul::where('ime', $moduli[$i])->where('studijsko_leto', $studijsko_leto)->first();
                    $modulski_predmeti = \DB::table('program_predmet')->where('id_modula', $modul->id)->where('studijsko_leto', $studijsko_leto)->lists('id_predmeta');
                    foreach ($modulski_predmeti as $p){
                        $predmet = \App\Models\Predmet::where('id', $p)->first();
                        if(\App\Models\StudentPredmet::where('id_studenta', $id_studenta)->where('id_predmeta', $predmet->id)->where('studijsko_leto', $studijsko_leto)->exists()){
                            $error = 1;
                            \Session::set('izbirni_predmet_info', 'Vsi izbrani izbirni predmeti morajo biti različni!');
                        }
                        else{
                            $st_predmet = new \App\Models\StudentPredmet;
                            $st_predmet->id_studenta = $id_studenta;
                            $st_predmet->id_predmeta = $predmet->id;
                            $st_predmet->letnik = $letnik;
                            $st_predmet->studijsko_leto = $studijsko_leto;
                            $st_predmet->save();
                        }
                    }
                    if($counter == $no_modul){
                        $counter = 0;
                        $mode = 1;
                        if($no_strokovno == 0) $mode = 2;
                    }
                }
                //shrani strokovne predmete
                else if($counter <= $no_strokovno && $mode == 1){
                    if($counter == $no_strokovno){
                        $counter = 0;
                        $mode = 2;
                    }
                    $predmet_naziv = $strokovnoizbirniPredmeti[$i];
                    $predmet = \App\Models\Predmet::where('naziv', $predmet_naziv)->first();
                    if(\App\Models\StudentPredmet::where('id_studenta', $id_studenta)->where('id_predmeta', $predmet->id)->where('studijsko_leto', $studijsko_leto)->exists()){
                        $error = 1;
                    }
                    else{
                        $st_predmet = new \App\Models\StudentPredmet;
                        $st_predmet->id_studenta = $id_studenta;
                        $st_predmet->id_predmeta = $predmet->id;
                        $st_predmet->letnik = $letnik;
                        $st_predmet->studijsko_leto = $studijsko_leto;
                        $st_predmet->save();
                    }
                }
                //shrani splošnoizbirne predmete
                else if($counter <= $no_prosto * 2 && $mode == 2){
                    $predmet_naziv = $prostoizbirniPredmeti[$i];
                    if(!($predmet_naziv == 'Ni izbranega predmeta')) {
                        $kt = substr($predmet_naziv, -5, 1);
                        $vsotaKT += $kt;
                        $predmet_naziv = substr($predmet_naziv, 0, -7);
                        $predmet = \App\Models\Predmet::where('naziv', $predmet_naziv)->first();
                        if(\App\Models\StudentPredmet::where('id_studenta', $id_studenta)->where('id_predmeta', $predmet->id)->where('studijsko_leto', $studijsko_leto)->exists()){
                            $error = 1;
                        }
                        else {
                            $st_predmet = new \App\Models\StudentPredmet;
                            $st_predmet->id_studenta = $id_studenta;
                            $st_predmet->id_predmeta = $predmet->id;
                            $st_predmet->letnik = $letnik;
                            $st_predmet->studijsko_leto = $studijsko_leto;
                            $st_predmet->save();
                        }
                    }
                }
                $counter++;
            }
            $first = false;
        }

        if($vsotaKT < $no_prosto * 6) {
            \Session::set('izbirni_predmet_info', 'Izbrani predmeti imajo premalo kreditnih točk!');
            $error = 1;
        }
        if($error == 1) \DB::rollback();
        else {
            \DB::commit();
            \Session::set('izbirni_predmet_info', 'Izbrini predmeti uspešno shranjeni');
        }

        $prostoIzbirniPredmeti = self::getProstoizbirnePredmete($studijsko_leto, $letnik);
        $strokovnoIzbirniPredmeti = self::getStrokovnoizbirnePredmete($studijsko_leto, $letnik);
        $modulskiIzbirniPredmeti = self::getModulskePredmete($studijsko_leto, $letnik);
        $prostoIzbirniPredmeti = array_merge($prostoIzbirniPredmeti, $strokovnoIzbirniPredmeti, $modulskiIzbirniPredmeti);
        array_unshift($prostoIzbirniPredmeti, 'Ni izbranega predmeta');

        $student_obvestilo = $student->vpisna." - ".$student->ime." ".$student->priimek." (".$letnik.". letnik ".$program->oznaka.")";

        return \View::make('izbirni_predmeti/izbirni_predmet_ref')->with('moduli', $moduli)->with('modulski', $modulskiIzbirniPredmeti)->with('strokovno_izbirni', $strokovnoIzbirniPredmeti)->with('prosto_izbirni', $prostoIzbirniPredmeti)
            ->with('st_modulov', $no_modul)->with('st_strokovno', $no_strokovno)->with('st_prosto', $no_prosto)->with('opis', $student_obvestilo)->with('prosta_izbira_modulskih_predmetov', $studentProgram->prosta_izbira);
    }

}