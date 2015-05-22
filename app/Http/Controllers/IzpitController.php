<?php namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\IzpitniRok;
use Illuminate\Http\Request;


class IzpitController extends Controller {

    public function studentoviRazpisaniRoki()
    {
        $student = Student::where('email','=',\Session::get('session_id'))->first();

        $razpisani_roki = $student->razpisaniRoki(date('Y-m-d',strtotime('-1 week')));
        $polaganja = $student->polaganja()->get();
        $prijave = $stevilo_polaganj = $neocenjena_polaganja = [];
        foreach($polaganja as $polaganje){
            $prijave[] = $polaganje->id;
            if($polaganje->pivot->ocena == 0){
                $neocenjena_polaganja[] = $polaganje->id_predmeta;
            }
            if(isset($stevilo_polaganj[$polaganje->id_predmeta])){
                $stevilo_polaganj[$polaganje->id_predmeta]++;
            }else{
                $stevilo_polaganj[$polaganje->id_predmeta] = 1;
            }
        }
        //$neocenjena_polaganja = $student->polaganja()->wherePivot('ocena','=',0)->get();
        $opravljeni_predmeti = $student->Predmeti()->wherePivot('ocena','>',5)->lists('id_predmeta');
        return view('izpitni_roki/studentIzpitniRoki',['izpitni_roki'=>$razpisani_roki,'prijave'=>$prijave,
            'student'=>$student, 'neocenjena_polaganja'=>$neocenjena_polaganja, 'opravljeni_predmeti'=>$opravljeni_predmeti,
            'stevilo_polaganj'=>$stevilo_polaganj]);
    }

    public function prijava(Request $request)
    {
        $student = Student::find($request['student_id']);
        $izpitni_rok = IzpitniRok::find($request['izpitni_rok_id']);
        if($request['action']=='prijava'){
            $student->izpitniRoki()->attach($izpitni_rok->id);
            return \Redirect::back()->with('odgovor','Prijava uspešna.');
        }elseif($request['action']=='odjava'){
            $student->izpitniRoki()->detach($izpitni_rok->id);
            return \Redirect::back()->with('odgovor','Odjava uspešna.');
        }
        return \Redirect::back()->withErrors('Prišlo je do neznane napake!');

    }
}