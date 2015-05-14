<?php namespace App\Http\Controllers;

use App\Helpers\ExportHelper;
use App\Models\VrstaVpisa;

class ListStudentsController extends Controller {

    public function __construct() {
        $this->middleware('guest');
    }

    public function get_all_students(){
        $predmeti = \App\Models\Predmet::orderBy('naziv', 'asc')->lists('naziv', 'id');
        $leta = array_unique(\App\Models\StudentPredmet::lists('studijsko_leto'));
        $leta = array_values($leta);
        $predmeti2 = array();
        foreach($predmeti as $p){
            $pr = \App\Models\Predmet::where('naziv', $p)->first();
            $p = $p . ' (' . $pr->sifra . ')';
           array_push($predmeti2, $p);
        }
        return \View::make('seznam')->with('predmeti', $predmeti2)->with('leta', $leta)->with('student_list', '')->with('predmet_id', 1)->with('leto_id', 0);
    }

    public function getStudents(){
        //dobi predmetid
        $predmeti = \App\Models\Predmet::orderBy('naziv', 'asc')->lists('id');
        $p_id2 = \Input::get('predmeti');
        $predmet_id = $predmeti[$p_id2];
        //echo $predmet_id;

        //dobi string leto
        $leto_id = \Input::get('leta');
        $leta = array_unique(\App\Models\StudentPredmet::lists('studijsko_leto'));
        $leta = array_values($leta);
        $l = $leta[$leto_id];

        //studentje
        $student_predmet_list = \App\Models\StudentPredmet::where('id_predmeta', $predmet_id)->where('studijsko_leto', $l)->lists('id_studenta');
        $student_list = array();

        $c = 1;
        foreach ($student_predmet_list as $s) {
            $student = \App\Models\Student::find($s);
            $student['zaporedna'] = $c;
            $student['vrstavpisa'] = \App\Models\StudentProgram::where('id_studenta', $s)->pluck('vrsta_vpisa');
            array_push($student_list, $student);
            $c++;
        }

        usort($student_list, array($this, "cmp"));

        if(count($student_predmet_list) == 0){
            $student_list = '';
        }

        //
        $predmeti = \App\Models\Predmet::orderBy('naziv', 'asc')->lists('naziv', 'id');
        $leta = array_unique(\App\Models\StudentPredmet::lists('studijsko_leto'));
        $leta = array_values($leta);

        //dobi vse vrste vpisa
        $vrsteVpisa = VrstaVpisa::all()->keyBy('sifra');

        $predmeti2 = array();
        foreach($predmeti as $p){
            $pr = \App\Models\Predmet::where('naziv', $p)->first();
            $p = $p . ' (' . $pr->sifra . ')';
            array_push($predmeti2, $p);
        }

        $csv = \Input::get('csv');
        $pdf = \Input::get('pdf');
        if(!is_null($csv) || !is_null($pdf)){
            $export_content = [['Šifra','Vpisna številka','Ime','Ocena','Vrsta vpisa']];
            foreach($student_list as $s){
                $export_content[] = [$s->id, $s->vpisna, $s->ime.' '.$s->priimek, $s->ocena, $vrsteVpisa->get($s->vrstavpisa)->ime];
            }
            if(!is_null($pdf)){
                $predmet = \App\Models\Predmet::find($predmet_id);
                $pdf = \App::make('dompdf');
                $pdf->loadHTML(\View::make('pdf/seznam_vpisanih_v_predmet')->with('student_list', $student_list)->with('predmet', $predmet->naziv)->with('leto', $l)->with('vrsteVpisa',$vrsteVpisa));
                return $pdf->download('seznam.pdf');
            }else{
                ExportHelper::make_csv($export_content,'Seznam vpisanih');
            }
        }

        return \View::make('seznam')->with('student_list', $student_list)->with('predmeti', $predmeti2)->with('leta', $leta)->with('predmet_id', $p_id2)->with('leto_id', $leto_id)->with('vrsteVpisa',$vrsteVpisa);
    }

    ///////////////////////////////////////////////////////////////////////////////////////////

    public function cmp($a, $b){

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

    public function getPotrdilo($id, $id_programa){

        $student =  \App\Models\Student::find($id);
        $student_program = \App\Models\StudentProgram::find($id_programa);
        $id_programa = $student_program->id_programa;
        $program = \App\Models\StudijskiProgram::find($id_programa);

        $danes = date('d.m.Y');
        $datum_rojstva = $student->datum_rojstva;
        $datum_rojstva = date("d.m.Y", strtotime($datum_rojstva));
        $pdf = \App::make('dompdf');
        $stevilo = 6;
        $view = \View::make('potrdiloVpis')
            ->with('date', $danes)
            ->with('stevilo', $stevilo)
            ->with('ime', $student->ime)
            ->with('priimek', $student->priimek)
            ->with('vpisna', $student->vpisna)
            ->with('datum_rojstva', $datum_rojstva)
            ->with('kraj_rojstva', $student->obcina_rojstva)
            ->with('letnik', $student_program->letnik)
            ->with('studijsko_leto', $student_program->studijsko_leto)
            ->with('vrsta_vpisa', $student_program->nacin_studija)
            ->with('program', $program->ime);
        $pdf->loadHTML($view);
        return $pdf->download('Potrdila o vpisu.pdf');
    }

    public function cmp2($a, $b){
        return strcmp($a, $b);
    }

    public function natisniVpisniList($id){

        $student = \App\Models\Student::find($id);
        $student_program = $student->studentProgram()->where('studijsko_leto', '2014/2015')->first();

        if($student_program == null) return redirect()->back();

        $prvi_vpis = $student->studentProgram()->where('id_programa', $student_program->id_programa)->lists('datum_vpisa');
        usort($prvi_vpis, array($this, "cmp2"));
        $prvi_vpis = $prvi_vpis[0];
        $program = \App\Models\StudijskiProgram::find($student_program->id_programa);
        $obvezni_predmeti = $program->predmeti()->where('tip', '=', 'obvezni')->where('letnik', '=', $student_program->letnik)->where('studijsko_leto', '2014/2015')->distinct();
        $izbirni_predmeti = \App\Models\StudentPredmet::where('id_studenta', $id)->where('studijsko_leto', '2014/2015')->lists('id_predmeta');
        $izbirni = array();
        $o_predmeti = array();

        $st_KT = 0;

        foreach($obvezni_predmeti->get() as $op){
            $nosilec_id = $op->id_nosilca;
            $nosilec = \App\Models\Nosilec::find($nosilec_id);
            $n= $nosilec->ime . " " . $nosilec->priimek;
            $op['n'] = $n;
            $st_KT += $op->KT;
            array_push($o_predmeti, $op);
        }

        foreach ($izbirni_predmeti as $i) {
            if (\DB::table('program_predmet')->where('id_predmeta', $i)->where('studijsko_leto', '2014/2015')->exists()) {
                $bla = \DB::table('program_predmet')->where('id_predmeta', $i)->where('studijsko_leto', '2014/2015')->first();
                if ($bla->tip == 'splošno-izbirni' || $bla->tip == 'strokovni-izbirni' || $bla->tip == 'modulski') {
                    $pred = \App\Models\Predmet::where('id', $i)->first();
                    $nosilec_id = $pred->id_nosilca;
                    $nosilec = \App\Models\Nosilec::find($nosilec_id);
                    $n= $nosilec->ime . " " . $nosilec->priimek;
                    $st_KT += $pred->KT;
                    $pred['n'] = $n;
                    array_push($izbirni, $pred);
                }
            }
        }

        ini_set('max_execution_time', 300);
        $pdf = \App::make('dompdf');
        $pdf->loadHTML(\View::make('pdf/vpisni_list_pdf')->with('student', $student)->with('program', $program)->with('studijsko_leto', '2014/2015')->with('program_student', $student_program)->with('obvezni_predmeti', $o_predmeti)->with('prvi_vpis', $prvi_vpis)->with('izbirni', $izbirni)->with('skupne_KT', $st_KT));
        return $pdf->download('vpisni_list.pdf');

        //return \View::make('pdf/vpisni_list_pdf')->with('student', $student)->with('program', $program)->with('studijsko_leto', '2014/2015')->with('program_student', $student_program)->with('obvezni_predmeti', $o_predmeti)->with('prvi_vpis', $prvi_vpis)->with('izbirni', $izbirni);

    }


    public function returnBack(){
        return view('student/iskanjeStudenta');
    }
}