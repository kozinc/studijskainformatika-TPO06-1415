<?php namespace App\Http\Controllers;

class IzpitniRokController extends Controller {

    public function __construct(){
        $this->middleware('guest');
    }

    // ustvari enostaven view, bi izbran noben izpit
    public function getSpremeniIzpitniRok(){
        $predmeti = \App\Models\Predmet::orderBy('naziv', 'ASC')->lists('id');
        $predmeti2 = array();

        //izloci diplomsko delo in magistersko delo
        foreach($predmeti as $p){
            $pr = \App\Models\Predmet::where('id', $p)->first();
            $ime = $pr->sifra . " - " . $pr->naziv;
            if($pr->sifra != '11111'){
                if($pr->sifra != '22222') array_push($predmeti2, $ime);
            }
        }
        array_unshift($predmeti2, 'Izberi predmet...');
        //

        // doloci katere predmete lahko ureja
        if(\Session::get("vloga") == "ucitelj"){
            $prof_email = \Session::get('session_id');
            $ucitelj = \App\Models\Nosilec::where('email', $prof_email)->first();
            \Session::set('nosilec', $ucitelj->id);
        }
        else \Session::set('nosilec', '');
        //

        $nosilci = array();
        $nosilci[0] = 0;
        $nosilci[1] = 0;
        $nosilci[2] = 0;
        return \View::make('izpitni_roki/spremeniIzpitniRok')->with('predmeti', $predmeti2)->with('predmet_id', 0)->with('izpitni_roki', '')->with('nosilci', $nosilci)->with('dd_nosilci', $nosilci);
    }

    // za izbrani predmet izpise izpitne roke
    public function getPredmetRoki(){

        $predmet_id2 = \Input::get('predmeti');
        if($predmet_id2 == 0) self::getSpremeniIzpitniRok();
        $predmeti = \App\Models\Predmet::orderBy('naziv', 'ASC')->lists('id');
        $predmeti2 = array();

        //izloci diplomsko delo in magistersko delo
        foreach($predmeti as $p){
            $pr = \App\Models\Predmet::where('id', $p)->first();
            if($pr->sifra != '11111'){
                if($pr->sifra != '22222') array_push($predmeti2, $p);
            }
        }
        array_unshift($predmeti2, 0);
        $predmet_id = $predmeti2[$predmet_id2];
        \Session::set("izbrani_predmet", $predmet_id);
        $predmet = \App\Models\Predmet::find($predmet_id);

        $izpitni_roki_list = array();
        $datumi_izpitov = array();
        $nosilci = array();
        $nosilci[0] = 0;
        $nosilci[1] = 0;
        $nosilci[2] = 0;

        $dd_nosilci = array();
        $dd_nosilci[0] = 0;
        $dd_nosilci[1] = 0;
        $dd_nosilci[2] = 0;

        if(\DB::table('program_predmet')->where('id_predmeta', $predmet_id)->where('studijsko_leto', '2014/2015')->exists()){

            //datumi za spreminjat izpitne roke
            $izpitni_roki = \App\Models\IzpitniRok::where('id_predmeta', $predmet_id)->orderBy('datum', 'DESC')->get();
            $dat = \App\Models\IzpitniRok::where('id_predmeta', $predmet_id)->orderBy('datum', 'DESC')->lists('datum');
            $ids = \App\Models\IzpitniRok::where('id_predmeta', $predmet_id)->orderBy('datum', 'DESC')->lists('id');
            $no = count($dat);
            for($j = 0; $j < $no; $j++){
                $a = date("d.m.Y", strtotime($dat[$j]));
                $datumi_izpitov[$ids[$j]] = $a;
            }

            if(\DB::table('program_predmet')->where('id_predmeta', $predmet_id)->where('studijsko_leto', '2014/2015')->count() > 1){
                $program_predmeti = \DB::table('program_predmet')->where('id_predmeta', $predmet_id)->where('studijsko_leto', '2014/2015')->lists('id');
                $pp = \DB::table('program_predmet')->where('id', $program_predmeti[0])->first();
                $nos = \App\Models\Nosilec::find($pp->id_nosilca1);
                $dd_nosilci[0] = $nos->ime . " " . $nos->priimek;
                $pp = \DB::table('program_predmet')->where('id', $program_predmeti[1])->first();
                $nos = \App\Models\Nosilec::find($pp->id_nosilca1);
                $dd_nosilci[1] = $nos->ime . " " . $nos->priimek;
                //ce sta 2 za isti predmet jih dobis iz izpitnih rokov
                foreach ($izpitni_roki as $i) {
                    $nosilec = $i->id_nosilca;
                    $nosilec1 = \App\Models\Nosilec::find($nosilec);
                    $nosilci[0] = $nosilec1->id;
                    $nosilci[1] = 0;
                    $nosilci[2] = 0;
                    $nosilec1 = $nosilec1->ime . " " . $nosilec1->priimek;
                    $nosilec2 = '';
                    $nosilec3 = '';

                    $i['nosilec'] = $nosilec1 . "" . $nosilec2 . "" .$nosilec3;
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
            }
            else {
                foreach ($izpitni_roki as $i) {
                    $nosilec = \DB::table('program_predmet')->where('id_predmeta', $predmet_id)->where('studijsko_leto', $i->studijsko_leto)->first();
                    $nosilec1 = \App\Models\Nosilec::find($nosilec->id_nosilca1);
                    $nosilec2 = \App\Models\Nosilec::find($nosilec->id_nosilca2);
                    $nosilec3 = \App\Models\Nosilec::find($nosilec->id_nosilca3);
                    $nosilci[0] = $nosilec1->id;
                    $nosilec1 = $nosilec1->ime . " " . $nosilec1->priimek;
                    if ($nosilec->id_nosilca2 != 0) {
                        $nosilci[1] = $nosilec2->id;
                        $nosilec2 = ", " . $nosilec2->ime . " " . $nosilec2->priimek;
                    } else {
                        $nosilec2 = "";
                        $nosilci[1] = 0;
                    }
                    if ($nosilec->id_nosilca3 != 0) {
                        $nosilci[2] = $nosilec3->id;
                        $nosilec3 = ", " . $nosilec3->ime . " " . $nosilec3->priimek;
                    } else {
                        $nosilec3 = "";
                        $nosilci[2] = 0;
                    }

                    $i['nosilec'] = $nosilec1 . "" . $nosilec2 . "" .$nosilec3;
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
            }
        }

        if(sizeof($izpitni_roki_list) == 0){
            $izpitni_roki_list = '';
            \Session::set("izpitni_roki_sporocilo", "Za predmet ni razpisanih izpitnih rokov");
        }
        else{
            \Session::set("izpitni_roki_sporocilo", "");
        }

        $predmeti2 = array();
        foreach($predmeti as $p){
            $pr = \App\Models\Predmet::where('id', $p)->first();
            $ime = $pr->sifra . " - " . $pr->naziv;
            if($pr->sifra != '11111'){
                if($pr->sifra != '22222') array_push($predmeti2, $ime);
            }
        }
        array_unshift($predmeti2, 'Izberi predmet...');
        return \View::make('izpitni_roki/spremeniIzpitniRok')->with('predmeti', $predmeti2)->with('predmet_id', $predmet_id2)->with('izpitni_roki', $izpitni_roki_list)->with('datumi_izpitov', $datumi_izpitov)->with('nosilci', $nosilci)->with('dd_nosilci', $dd_nosilci);
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
        $izpitni_rok = new \App\Models\IzpitniRok;
        $date = \Input::get('date');
        $ura = \Input::get('ura');
        $nosilec = \Input::get('nosilec');
        $predavalnice = \Input::get('prostor');
        if($nosilec == 0) $id = 17;
        else $id = 35;

        if($date != ''){
            $deli_datuma = explode('.', $date);
            $datum = $deli_datuma[2] . "-"  . $deli_datuma[1] . "-" . $deli_datuma[0];
        }

        $program_predmeti = \DB::table('program_predmet')->where('id_predmeta', $predmet_id)->where('studijsko_leto', '2014/2015')->lists('id');
        $pp = \DB::table('program_predmet')->where('id', $program_predmeti[0])->first();
        $nos = \App\Models\Nosilec::find($pp->id_nosilca1);
        $dd_nosilci[0] = $nos->ime . " " . $nos->priimek;
        $pp = \DB::table('program_predmet')->where('id', $program_predmeti[1])->first();
        $nos = \App\Models\Nosilec::find($pp->id_nosilca1);
        $dd_nosilci[1] = $nos->ime . " " . $nos->priimek;

        $double = \App\Models\IzpitniRok::where('id_predmeta', $predmet_id)->where('datum', $datum) -> lists('id_nosilca');
        if($nosilec != ''){
            $duplo = 0;
            foreach($double as $d){
                $nos = \App\Models\Nosilec::find($d);
                $ime = $nos->ime . " " . $nos->priimek;
                if($ime == $dd_nosilci[$nosilec]){
                    $duplo = 1;
                }
            }

            $double = null;
        }

        $predmet = \App\Models\Predmet::find($predmet_id);
        $program_predmet = \DB::table('program_predmet')->where('id_predmeta', $predmet_id)->where('studijsko_leto', '2014/2015')->lists('id_nosilca1');

        if($date == ""){
            \Session::set("izpitni_roki_sporocilo", "Napaka pri shranjevanju - vnesite datum");
        }
        else if($double != null || $duplo == 1){
            \Session::set("izpitni_roki_sporocilo", "Napaka pri shranjevanju - za izbrani datum že obstaja izpitni rok");
        }
        else{
            $izpitni_rok->datum = $datum;
            $izpitni_rok->id_predmeta = $predmet_id;
            $izpitni_rok->id_nosilca = $id;
            $izpitni_rok->studijsko_leto = "2014/2015";
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
        $predmet = \App\Models\Predmet::where('id', $izpit->id_predmeta)->first();
        $studentje = array();

        $counter = 0;
        foreach ($student_izpit as $s) {
            $student = \App\Models\Student::where('id', $s->id_studenta)->first();
            array_push($studentje, $student);
        }

        $datum = date("d.m.Y", strtotime($izpit->datum));

        $list = new \App\Http\Controllers\ListStudentsController;
        usort($studentje, array($list, "cmp"));

        foreach ($studentje as $s){
            $counter = $counter + 1;
            $s["zaporedna_st"] = $counter;
        }

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