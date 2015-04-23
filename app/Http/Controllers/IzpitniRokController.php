<?php namespace App\Http\Controllers;

class IzpitniRokController extends Controller {

    public function __construct(){
        $this->middleware('guest');
    }

    public function getNovIzpitniRok(){
        return \View('izpitni_roki/novIzpitniRok');
    }

    public function getSpremeniIzpitniRok(){
        $predmeti = \App\Models\Predmet::lists('naziv', 'id');
        return \View::make('izpitni_roki/spremeniIzpitniRok')->with('predmeti', $predmeti)->with('predmet_id', 1)->with('izpitni_roki', '');
    }

    public function getPredmetRoki(){
        $predmet_id = \Input::get('predmeti');
        \Session::set("izbrani_predmet", $predmet_id);
        $izpitni_roki = \App\Models\IzpitniRok::where('id_predmeta', $predmet_id)->get();
        $izpitni_roki_list = array();

        foreach ($izpitni_roki as $i) {
            $i['st_prijav'] = \DB::table('student_izpit')->where('id_izpitnega_roka', $i->id)->distinct()->count();
            $today = date("Y-m-d");
            if($today < $i->datum){
                $i['ocene'] = "Spremeni/Briši";
            }
            if($i['st_prijav'] > 0){
                $bla = \DB::table('student_izpit')->where('id_izpitnega_roka', $i->id)->first();
                if($bla->ocena != 0 && $i['ocene'] == null){
                    $i['ocene'] = "Ocene so vnešene";
                }
            }
            array_push($izpitni_roki_list, $i);
        }
        if(sizeof($izpitni_roki_list) == 0){
            $izpitni_roki_list = '';
            \Session::set("izpitni_roki_sporocilo", "Za predmet ni razpisanih izpitnih rokov");
        }
        else{
            \Session::set("izpitni_roki_sporocilo", "");
        }
        $predmeti = \App\Models\Predmet::lists('naziv', 'id');
        return \View::make('izpitni_roki/spremeniIzpitniRok')->with('predmeti', $predmeti)->with('predmet_id', $predmet_id)->with('izpitni_roki', $izpitni_roki_list);
    }

    public function obvestiStudente($id_izpita, $sporocilo){

        $student_izpit = \DB::table('student_izpit')->where('id_izpitnega_roka', $id_izpita)->get();
        $izpit = \App\Models\IzpitniRok::where('id', $id_izpita)->first();
        $datum_izpita = $izpit->datum;
        $ime_predmeta = \App\Models\Predmet::where('id', $izpit->id_predmeta)->first();
        $ime_predmeta = $ime_predmeta->naziv;

        $subject = "Referat FRI - sprememba izpitnega roka";

        if($sporocilo == "Brisanje"){
            $s = "Pozdravljeni, <br> Obveščamo vas, da je bil izpitni rok predmeta ". $ime_predmeta . " dne " . $datum_izpita . "
                                        odstranjen. Vaša prijava na izpit je bila samodejno vrnjena. <br>
                                        Lep pozdrav <br> referat FRI";
        }
        else if($sporocilo == "Sprememba"){

        }

        $send_mail = new \App\Helpers\MailHelper;

        foreach ($student_izpit as $izpit) {
            $student_id = $izpit->id_studenta;
            $student = \App\Models\Student::where('id', $student_id)->first();
            $mail = $student->email;
            //$send_mail->send("veronika.blazic@gmail.com", $mail, "Referat FRI - Sprememba izpitnega roka", $s);
        }

        //$send_mail->send("veronika.blazic@gmail.com", $mail, "Referat FRI - Sprememba izpitnega roka", $s);
    }

    public function brisiIzpitniRok($id){
        self::obvestiStudente($id, "Brisanje");
        \App\Models\IzpitniRok::where('id', $id)->delete();
        \DB::table('student_izpit')->where('id_izpitnega_roka', $id)->delete();
        return self::getSpremeniIzpitniRok();
    }

    public function dodajIzpitniRok(){
        $predmet_id = \Session::get("izbrani_predmet");
        $izpitni_roki = new \App\Models\IzpitniRok;
        $date = \Input::get('date');
        $deli_datuma = explode('.', $date);
        $datum = $deli_datuma[2] . "-"  . $deli_datuma[1] . "-" . $deli_datuma[0];
        if($date != ""){
            $izpitni_roki->datum = $datum;
            $izpitni_roki->id_predmeta = $predmet_id;
            $izpitni_roki->save();
            \Session::set("izpitni_roki_sporocilo", "Izpitni rok je bil uspešno shranjen");
        }
        else{
           \Session::set("izpitni_roki_sporocilo", "Napaka pri shranjevanju - vnesite datum");
        }
        return self::getSpremeniIzpitniRok();
    }
}