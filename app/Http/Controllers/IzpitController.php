<?php namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\IzpitniRok;
use Illuminate\Http\Request;


class IzpitController extends Controller {

    public function studentoviRazpisaniRoki($id_studenta=0)
    {
        return $this->mojiRazpisaniRoki($id_studenta);
    }
    public function mojiRazpisaniRoki($id_studenta=0)
    {
        if(date('m') >= 10){
            $trenutno_leto = date('Y').'/'.date('Y',strtotime('+1 year'));
        }else{
            $trenutno_leto = date('Y',strtotime('-1 year')).'/'.date('Y');
        }
        $pavzer = $redno = $ponavljanje = false;
        if($id_studenta > 0){
            $student = Student::find($id_studenta);
        }else{
            $student = Student::where('email','=',\Session::get('session_id'))->first();
        }
        $referent = false;
        if(\Session::get('vloga')=='referent'){
            $referent = true;
        }

        $student_programi = $student->studentProgram()->get();
        $pavzerska_studijska_leta = $regularna_studijska_leta = $redna_studijska_leta = [];
        foreach($student_programi as $sp){
            if($sp->vrsta_vpisa == 5){
                if($sp->studijsko_leto == $trenutno_leto){
                    $pavzer = true;
                }
                $pavzerska_studijska_leta[] = $sp->studijsko_leto;
            }else{
                $regularna_studijska_leta[] = $sp->studijsko_leto;
            }
            if($sp->vrsta_vpisa == 1){
                if($sp->studijsko_leto == $trenutno_leto){
                    $redno = true;
                }
                $redna_studijska_leta[] = $sp->studijsko_leto;
            }
            if($sp->vrsta_vpisa == 2){
                if($sp->studijsko_leto == $trenutno_leto){
                    $ponavljanje = true;
                }
            }
        }

        $razpisani_roki = $student->razpisaniRoki(date('Y-m-d',strtotime('-1 week')))->sortBy('datum');
        $polaganja = $student->polaganja()->get();
        $opravljeni_predmeti = $student->Predmeti()->wherePivot('ocena','>',5)->lists('id_predmeta');
        $prijave = $stevilo_polaganj = $neocenjena_polaganja = $pavzerska_polaganja = $letosnja_polaganja =
        $premalo_dni = $redna_polaganja = $polaganja_s_statusom = [];
        foreach($polaganja as $polaganje){
            $prijave[] = $polaganje->id;
            if(in_array($polaganje->studijsko_leto,$pavzerska_studijska_leta)){
                if(isset($pavzerska_polaganja[$polaganje->id_predmeta])){
                    $pavzerska_polaganja[$polaganje->id_predmeta]++;
                }else{
                    $pavzerska_polaganja[$polaganje->id_predmeta] = 1;
                }
            }
            if(in_array($polaganje->studijsko_leto,$redna_studijska_leta)){
                if(isset($redna_polaganja[$polaganje->id_predmeta])){
                    $redna_polaganja[$polaganje->id_predmeta]++;
                }else{
                    $redna_polaganja[$polaganje->id_predmeta] = 1;
                }
            }
            if(in_array($polaganje->studijsko_leto,$regularna_studijska_leta)){
                if(isset($polaganja_s_statusom[$polaganje->id_predmeta])){
                    $polaganja_s_statusom[$polaganje->id_predmeta]++;
                }else{
                    $polaganja_s_statusom[$polaganje->id_predmeta] = 1;
                }
            }

            if($polaganje->studijsko_leto == $trenutno_leto){
                if(isset($letosnja_polaganja[$polaganje->id_predmeta])){
                    $letosnja_polaganja[$polaganje->id_predmeta]++;
                }else{
                    $letosnja_polaganja[$polaganje->id_predmeta] = 1;
                }
            }
            if($polaganje->pivot->ocena == 0 || ($polaganje->pivot->ocena > 5 && !in_array($polaganje->id_predmeta,$opravljeni_predmeti))){
                $neocenjena_polaganja[] = $polaganje->id_predmeta;
            }
            if(isset($stevilo_polaganj[$polaganje->id_predmeta])){
                $stevilo_polaganj[$polaganje->id_predmeta]++;
            }else{
                $stevilo_polaganj[$polaganje->id_predmeta] = 1;
            }
            if($polaganje->datum > date('Y-m-d',strtotime('-10 days')) && $polaganje->datum < date('Y-m-d')){
                $premalo_dni[$polaganje->id_predmeta] = $polaganje->datum;
            }
        }
        //$neocenjena_polaganja = $student->polaganja()->wherePivot('ocena','=',0)->get();
        return view('izpitni_roki/studentIzpitniRoki',['izpitni_roki'=>$razpisani_roki,'prijave'=>$prijave,
            'student'=>$student, 'neocenjena_polaganja'=>$neocenjena_polaganja, 'opravljeni_predmeti'=>$opravljeni_predmeti,
            'stevilo_polaganj'=>$stevilo_polaganj, 'letosnja_polaganja'=>$letosnja_polaganja, 'redna_polaganja'=>$redna_polaganja,
            'pavzerska_polaganja'=>$pavzerska_polaganja, 'polaganja_s_statusom'=>$polaganja_s_statusom, 'pavzer'=>$pavzer,
            'redno'=>$redno, 'ponavljanje'=>$ponavljanje, 'premalo_dni'=>$premalo_dni, 'referent'=>$referent, 'trenutno_leto'=>$trenutno_leto]);
    }

    public function prijava(Request $request)
    {
        $student = Student::find($request['student_id']);
        $izpitni_rok = IzpitniRok::find($request['izpitni_rok_id']);
        $placilo_izpita = $request['placilo_izpita'];
        if($request['action']=='prijava'){
            $student->izpitniRoki()->attach($izpitni_rok->id,['placilo_izpita'=>$placilo_izpita, 'datum_prijave'=>date('Y-m-d')]);
            return \Redirect::back()->with('odgovor','Prijava uspešna.');
        }elseif($request['action']=='odjava'){
            $student->izpitniRoki()->detach($izpitni_rok->id);
            return \Redirect::back()->with('odgovor','Odjava uspešna.');
        }
        return \Redirect::back()->withErrors('Prišlo je do neznane napake!');

    }
}