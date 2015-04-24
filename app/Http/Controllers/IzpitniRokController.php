<?php namespace App\Http\Controllers;

class IzpitniRokController extends Controller {

    public function __construct(){
        $this->middleware('guest');
    }

    // ustvari enostaven view, bi izbran noben izpit
    public function getSpremeniIzpitniRok(){
        $predmeti = \App\Models\Predmet::lists('naziv', 'id');
        $datumi_izpitov = "";

        $predmet_id = \Session::get("izbrani_predmet");
        return \View::make('izpitni_roki/spremeniIzpitniRok')->with('predmeti', $predmeti)->with('predmet_id', 1)->with('izpitni_roki', '');
    }

    // za izbrani predmet izpise izpitne roke
    public function getPredmetRoki(){

        $predmet_id = \Input::get('predmeti');
        $predmet = \App\Models\Predmet::where('id', $predmet_id)->first();
        \Session::set("izbrani_predmet", $predmet_id);

        $nosilec = \App\Models\Nosilec::where('id', $predmet->id_nosilca)->first();

        $izpitni_roki = \App\Models\IzpitniRok::where('id_predmeta', $predmet_id)->orderBy('datum', 'ASC')->get();
        $izpitni_roki_list = array();
        $datumi_izpitov = array();

        $dat = \App\Models\IzpitniRok::where('id_predmeta', $predmet_id)->orderBy('datum', 'ASC')->lists('datum');
        $ids = \App\Models\IzpitniRok::where('id_predmeta', $predmet_id)->orderBy('datum', 'ASC')->lists('id');
        $no = count($dat);
        //datumi za spreminjat izpitne roke
        for($j = 0; $j < $no; $j++){
            $a = date("d.m.Y", strtotime($dat[$j]));
            $datumi_izpitov[$ids[$j]] = $a;
        }

        //za filat tabelo izpitnih rokov
        foreach ($izpitni_roki as $i) {
            $i['nosilec'] = $nosilec->ime . " " . $nosilec->priimek;
            $i['ime_predmeta'] = $predmet->sifra . " - " . $predmet->naziv;
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

            $datum = $i->datum;
            $datum = date("d.m.Y", strtotime($datum));
            $i->datum = $datum;
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
        return \View::make('izpitni_roki/spremeniIzpitniRok')->with('predmeti', $predmeti)->with('predmet_id', $predmet_id)->with('izpitni_roki', $izpitni_roki_list)->with('datumi_izpitov', $datumi_izpitov);
    }


    // obvesti studente, prijavljene na id_izpita
    public function obvestiStudente($id_izpita, $nov_rok, $sporocilo){

        $student_izpit = \DB::table('student_izpit')->where('id_izpitnega_roka', $id_izpita)->get();
        $izpit = \App\Models\IzpitniRok::where('id', $id_izpita)->first();
        $datum_izpita = $izpit->datum;
        $datum_izpita = date("d.m.Y", strtotime($datum_izpita));
        $ime_predmeta = \App\Models\Predmet::where('id', $izpit->id_predmeta)->first();
        $ime_predmeta = $ime_predmeta->naziv;

        $subject = "Referat FRI - sprememba izpitnega roka";

        if($sporocilo == "Brisanje"){
            $s = "Pozdravljeni, <br><br> Obveščamo vas, da je bil izpitni rok predmeta ". $ime_predmeta . " dne " . $datum_izpita . "
                                        odstranjen. Vaša prijava na izpit je bila samodejno vrnjena. <br><br>
                                        Lep pozdrav <br><br> Referat FRI";
        }
        else if($sporocilo == "Sprememba"){
            $s = "Pozdravljeni, <br><br> Obveščamo vas, da je bil izpitni rok predmeta ". $ime_predmeta . " iz dne " . $datum_izpita . "
                                        prestavljen na dan ". $nov_rok .". Vaša prijava na izpit je bila samodejno prenesena. <br><br>
                                        Lep pozdrav <br><br> Referat FRI";
        }

        $send_mail = new \App\Helpers\MailHelper;

        foreach ($student_izpit as $izpit) {
            $student_id = $izpit->id_studenta;
            $student = \App\Models\Student::where('id', $student_id)->first();
            $mail = $student->email;
            //$send_mail->send("veronika.blazic@gmail.com", $mail, "Referat FRI - Sprememba izpitnega roka", $s);
        }

        $send_mail->send("veronika.blazic@gmail.com", "veronika.blazic@gmail.com", "Referat FRI - Sprememba izpitnega roka", $s);
    }

    // brise izpitni rok, odjavi studente
    public function brisiIzpitniRok($id){
        self::obvestiStudente($id, '', "Brisanje");
        \DB::table('student_izpit')->where('id_izpitnega_roka', $id)->delete();
        \App\Models\IzpitniRok::where('id', $id)->delete();
        \Session::set("izpitni_roki_sporocilo", "Izpitni rok je bil izbrisan");
        return self::getSpremeniIzpitniRok();
    }

    //doda izpitni rok
    public function dodajIzpitniRok(){
        $predmet_id = \Session::get("izbrani_predmet");
        $st_izpitnih_rokov = \App\Models\IzpitniRok::where('id_predmeta', $predmet_id)->count();
        $izpitni_rok = new \App\Models\IzpitniRok;
        $date = \Input::get('date');
        $ura = \Input::get('ura');
        $predavalnice = \Input::get('prostor');

        if($date != ''){
            $deli_datuma = explode('.', $date);
            $datum = $deli_datuma[2] . "-"  . $deli_datuma[1] . "-" . $deli_datuma[0];
        }

        if($date == ""){
            \Session::set("izpitni_roki_sporocilo", "Napaka pri shranjevanju - vnesite datum");
        }
        else{
            $izpitni_rok->datum = $datum;
            $izpitni_rok->id_predmeta = $predmet_id;
            $izpitni_rok->studijsko_leto = "2014/15";
            $izpitni_rok->ura_izpita = $ura;
            $izpitni_rok->predavalnice = $predavalnice;
            $izpitni_rok->save();
            \Session::set("izpitni_roki_sporocilo", "Izpitni rok je bil uspešno shranjen");
        }
        return self::getSpremeniIzpitniRok();
    }

    public function izpisiSeznam($id){
        $student_izpit = \DB::table('student_izpit')->where('id_izpitnega_roka', $id)->get();
        $izpit =  \App\Models\IzpitniRok::where('id', $id)->first();
        $predmet = \App\Models\Predmet::where('id', $id)->first();
        $studentje = array();

        $counter = 0;
        foreach ($student_izpit as $s) {
            $student = \App\Models\Student::where('id', $s->id_studenta)->first();
            $counter = $counter + 1;
            $student["zaporedna_st"] = $counter;
            array_push($studentje, $student);
        }

        $datum = date("d.m.Y", strtotime($izpit->datum));

        $pdf = \App::make('dompdf');
        $pdf->loadHTML(\View::make('pdf/seznam_studentov')->with('studentje', $studentje)->with('datum', $datum)->with('predmet', $predmet));
        return $pdf->download('my.pdf');

    }

    public function spremeniIzpitniRok(){
        $predmet_id = \Session::get("izbrani_predmet");
        $star_izpitni_rok_id = \Input::get('star_rok');
        $nov_izpitni_rok = \Input::get('date1');
        $nova_ura = \Input::get('ura1');
        $nov_prostor = \Input::get('prostor1');

        if($nov_izpitni_rok != ""){
            self::obvestiStudente($star_izpitni_rok_id, $nov_izpitni_rok, "Sprememba");

            $deli_datuma = explode('.', $nov_izpitni_rok);
            $nov_izpitni_rok = $deli_datuma[2] . "-"  . $deli_datuma[1] . "-" . $deli_datuma[0];

            $spremeni_datum = \App\Models\IzpitniRok::where('id', $star_izpitni_rok_id)->first();
            $spremeni_datum->datum = $nov_izpitni_rok;
            if($nova_ura != "") $spremeni_datum->ura_izpita = $nova_ura;
            if($nov_prostor != "") $spremeni_datum->predavalnice = $nov_prostor;
            $spremeni_datum->save();

            \Session::set("izpitni_roki_sporocilo", "Izpitni rok je bil uspešno shranjen");
        }
        else {
            \Session::set("izpitni_roki_sporocilo", "Napaka pri shranjevanju - vnesite datum");
        }

        return self::getSpremeniIzpitniRok();
    }
}