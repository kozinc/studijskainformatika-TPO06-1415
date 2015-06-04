<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Nosilec;
use App\Models\StudentPredmet;
use DB;
use App\Models\Modul;
use App\Models\ProgramLetnik;
use App\Models\Predmet;
use App\Models\PredmetNosilec;
use App\Models\StudentProgram;
use App\Models\StudijskiProgram;
use Illuminate\Http\Request;
use App\Helpers\ExportHelper;
use Illuminate\Support\Facades\Redirect;

class StanjeVpisaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //$anyOption = array("0" => "Ne glede");
        //dobi string leto      $leto_id            $leta               $leto
        $leto_id = 0;
        $leta =  array_unique(\App\Models\StudentProgram::orderBy('studijsko_leto','desc')->lists('studijsko_leto'));
        //$leta = array_merge($anyOption,$leta2);
        $leta = array_values($leta);
        $leto = $leta[$leto_id];

		//Lists studijsko leto:
        $letniki=array_unique(\App\Models\StudentProgram::orderBy('letnik')->lists('letnik'));
        //var_dump($letniki);
        $trenutno_studijsko_leto = '2014/15';
		//Stanje vpisa
        //Vsi studijski programi
        $programi = StudijskiProgram::all()->keyBy('id');
        //var_dump($programi);
        $programLetnik = ProgramLetnik::all()->keyBy('id');
        //$programi = StudentProgram::studijski_program()->lists('id','ime');
        //var_dump($programLetnik);

        //Vsi moduli:
        $moduli = DB::table('modul')
            ->select('id_programa','ime','letnik')
            ->groupBy('ime')
            ->get();
        //Vsi studenti, prijavljeni v program:

        // Število študentov, prijavljenih v program/letnik v študijskemu letu
        // SELECT studijsko_leto,id_programa,letnik, COUNT(*) AS stStudentov FROM `student_program` GROUP BY id_programa,letnik,studijsko_leto ORDER BY stStudentov;

        //ŠTEVILO ŠTUDENTOV po študijskem letu, id_programa, letnik
        $stStudentov = DB::table('student_program')
            ->select('studijsko_leto','id_programa','letnik', DB::raw('count(*) as total'))
            ->groupBy('id_programa','letnik','studijsko_leto')
            ->orderBy('letnik')
            ->get();

        //IZPIŠI študente v letu, prog, letniku in nato štej za vsak modul!
        $student_list = DB::table('student_program')
            ->select('studijsko_leto','id_programa','letnik', DB::raw('count(*) as total'))
            //->groupBy('id_programa','letnik','studijsko_leto')
            ->orderBy('letnik')
            ->get();

        $query = StudentProgram::query();
        $student_list = $query->get();

        //to šteje št. študentov na modul za VSA leta -> popravi, da šteje posebej za eno leto

        $modul_array = array();
        foreach($moduli as $modul){
            foreach($leta as $l) {
                $modul_array[$l][$modul->ime] = 0;
            }
        }
        array_search($leto,$leta);

        foreach ($student_list as $sp) {
            foreach($leta as $l) {
                if ($sp->studijsko_leto == $l) {
                    foreach ($letniki as $letnik) {
                        if($sp->letnik == $letnik) {
                            foreach ($programi as $program) {
                                if($sp->id_programa == $program->id) {
                                    foreach ($sp->moduli($l, $sp)->get() as $modul1) {
                                        $modul_array[$l][$modul1->ime] = $modul_array[$l][$modul1->ime] + 1;

                                    }
                                }
                            }
                        }
                    }
                }
            }
        }


        $show = false;
        //var_dump($modul_array);

        return \View::make('stanjeVpisa')
            ->with('programi', $programi)
            ->with('stStudentov', $stStudentov)
            ->with('leta', $leta)
            ->with('leto_id', 0)
            ->with('programLetniki', $programLetnik)
            ->with('moduli', $moduli)
            ->with('show', $show)
            ->with('modul_array', $modul_array);
	}

	/**
	 * Export to PDF/CSV.
	 *
	 * @return Response
	 */
	public function export(Request $request)
	{
        //$anyOption = array("0" => "Ne glede");
        //dobi string leto      $leto_id            $leta               $leto
        $leto_id = \Input::get('leta');
        $leta =  array_unique(\App\Models\StudentProgram::orderBy('studijsko_leto','desc')->lists('studijsko_leto'));
        //$leta = array_merge($anyOption,$leta2);
        $leta = array_values($leta);
        $leto = $leta[$leto_id];

        //$leto = \Input::get('leta');

        //$leta2 =  array_unique(\App\Models\StudentProgram::orderBy('studijsko_leto','desc')->lists('studijsko_leto'));
        $letniki=array_unique(\App\Models\StudentProgram::orderBy('letnik')->lists('letnik'));
        $programi = StudijskiProgram::all()->keyBy('id');
        $stStudentov = DB::table('student_program')
            ->select('studijsko_leto','id_programa','letnik', DB::raw('count(*) as total'))
            ->groupBy('id_programa','letnik','studijsko_leto')
            ->orderBy('letnik')
            ->get();
        $programLetnik = $programLetniki = ProgramLetnik::all()->keyBy('id');
        $moduli = DB::table('modul')
            ->select('id_programa','ime','letnik')
            ->groupBy('ime')
            ->get();
        $query = StudentProgram::query();
        $student_list = $query->get();

        $modul_array = array();
        foreach($moduli as $modul){
            foreach($leta as $l) {
                $modul_array[$l][$modul->ime] = 0;
            }
        }
        //array_search($leto,$leta);

        foreach ($student_list as $sp) {
            foreach($leta as $l) {
                if ($sp->studijsko_leto == $l) {
                    foreach ($letniki as $letnik) {
                        if($sp->letnik == $letnik) {
                            foreach ($programi as $program) {
                                if($sp->id_programa == $program->id) {
                                    foreach ($sp->moduli($l, $sp)->get() as $modul1) {
                                        $modul_array[$l][$modul1->ime] = $modul_array[$l][$modul1->ime] + 1;

                                    }
                                }
                            }
                        }
                    }
                }
            }
        }


        $show = true;
        /*
            //'programi'=>$programi
            //'stStudentov'=>$stStudentov,
            //'leta'=>$leta,
            //'programLetniki'=>$programLetnik,
            //'moduli'=>$moduli,
            'modul_array'=>$modul_array
        */

        if(isset($request['pdf']))
        {
            $pdf = \App::make('dompdf');
            ini_set('max_execution_time', 300);
            $pdf->loadHTML(\View::make('pdf/stanjeVpisa_pdf')
                ->with('programi', $programi)
                ->with('stStudentov', $stStudentov)
                ->with('leto', $leto)
                ->with('programLetniki', $programLetniki)
                ->with('moduli', $moduli)
                ->with('modul_array', $modul_array)
            );
            return $pdf->download('stanjeVpisa.pdf');
        }
        elseif (isset($request['csv']))
        {
            $title = 'Stanje Vpisa';
            $ocenaSkupaj = 0;
            $ktSkupaj = 0;
            $content[] = ['Študentsko leto', $leto,'','', '','', '', ''];
            $content[] = ['','','','', '','', '', ''];
            $content[] = ['Program', 'Letnik', '', 'Število študentov', '','', '', ''];
            //@foreach($leta as $leto)

            $skupajTotal=0;
            foreach($programi as $program){
                $skupajTotalProgram=0;
                foreach($stStudentov as $row){
                    if($row->studijsko_leto == $leto && $row->id_programa == $program->id){
                        // $programi->get($row->id_programa)->ime
                        // $row->letnik
                        // $row->total
                        $skupajTotal=$skupajTotal+$row->total;$skupajTotalProgram=$skupajTotalProgram+$row->total;
                        $content[] = [$programi->get($row->id_programa)->ime, $row->letnik, '', $row->total, '','', '', ''];
                        foreach($programLetniki as $programLetnik){
                            if($programLetnik->id_programa==$row->id_programa){
                                if($programLetnik->letnik==$row->letnik){
                                    $steviloZaModule=0;

                                    foreach($modul_array[$leto] as $m){
                                        $steviloZaModule = $steviloZaModule + $m;
                                    }

                                    if($programLetnik->stevilo_modulov > 0 && $steviloZaModule > 0) {
                                        $content[] = ['', '', 'Modul', 'Število študentov', '', '', '', ''];
                                        foreach ($moduli as $modul) {
                                            if ($modul_array[$leto][$modul->ime] > 0) {
                                                // $modul->ime
                                                // $modul_array[$modul->ime]
                                                $content[] = ['', '', $modul->ime, $modul_array[$leto][$modul->ime], '', '', '', ''];
                                            }
                                        }
                                    }

                                }
                            }
                        }
                    }
                }
                if($skupajTotalProgram > 0){
                    $content[] = [$program->ime,'Skupno v programu:', '', $skupajTotalProgram, '','', '', ''];
                    $content[] = ['', '', '', '', '', '', '', ''];
                }
            }
                //<th> </th><th>Skupno v študijskem letu: </th> <th> <b>{{$skupajTotal}}</b> </th>
                $content[] = ['', '', '', '', '', '', '', ''];
                $content[] = ['', '', 'Skupno v študijskem letu:', $skupajTotal, '', '', '', ''];
            //@endforeach
            return ExportHelper::make_csv($content, $title, '');
        }

        return \View::make('stanjeVpisa')
            ->with('programi', $programi)
            ->with('stStudentov', $stStudentov)
            ->with('leta', $leta)
            ->with('leto_id', $leto_id)
            ->with('izbranoLeto', $leto)
            ->with('programLetniki', $programLetnik)
            ->with('moduli', $moduli)
            ->with('show', $show)
            ->with('modul_array', $modul_array);
	}

	/**
	 * Stanje vpisa za v posamezne predmete:
     *      za izbrano:
     *          študijsko leto,
     *          študijski program in
     *          letnik
	 *
     * podatki o številu vpisanih študentov v posamezne predmete
	 * @return Response
	 */
	public function StanjeVpisaZaPredmeteIzberi()
	{
		// tukaj je izbira
        /*
         * za izbrano:
     *          študijsko leto,         OK
     *          študijski program in    OK
     *          letnik                  OK
         * */
        //dobi string leto      $leto_id            $leta               $leto
        $leto_id = 0;// \Input::get('leta')
        $leta =  array_unique(\App\Models\StudentProgram::orderBy('studijsko_leto','desc')->lists('studijsko_leto'));
        //$leta = array_merge($anyOption,$leta2);
        $leta = array_values($leta);
        $leto = $leta[$leto_id];

        //$leto = \Input::get('leta');

        //studijski program    $id_programa         $studProgrami       $studProgram
        $id_programa = 0;// \Input::get('studProgrami')
        $studProgrami = array_unique(\App\Models\StudijskiProgram::lists('ime'));
        //$studProgrami = array_merge($anyOption,$studProgrami2);
        $studProgrami = array_values($studProgrami);
        $studProgram = $studProgrami[$id_programa];

        //letnik               $letnik_id           $letniki            $letnik
        $letnik_id = 0; // \Input::get('letniki')
        $letniki = array_unique(\App\Models\StudentProgram::lists('letnik'));
        //$letniki = array_merge($anyOption,$letniki2);
        $letniki = array_values($letniki);
        $letnik = $letniki[$letnik_id];

        return \View::make('stanjeVpisaZaPredmete')
            // leto
            ->with('leta', $leta)
            ->with('leto_id', 0)
            // letnik
            ->with('letniki', $letniki)
            ->with('letnik_id', 0)
            // stud program
            ->with('studProgrami', $studProgrami)
            ->with('id_programa', 0)

            ->with('stStudentov', '');


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function StanjeVpisaZaPredmeteShow(Request $request)
    {
        // tukaj je izbira
        /*
         * za izbrano:
     *          študijsko leto,         OK
     *          študijski program in    OK
     *          letnik                  OK
         * */
        //var_dump(\Input::all());
        $anyOption = array("0" => "Ne glede");
        //dobi string leto      $leto_id            $leta               $leto
        $leto_id = \Request::get('leta');
        if(is_null($leto_id)){
            $leto_id=0;
        }

        $leta =  array_unique(\App\Models\StudentProgram::orderBy('studijsko_leto','desc')->lists('studijsko_leto'));
        //$leta = array_merge($anyOption,$leta2);
        $leta = array_values($leta);
        $leto = $leta[$leto_id];

        //$leto = \Input::get('leta');

        //studijski program    $id_programa         $studProgrami       $studProgram
        $id_programa = \Request::get('studProgrami');
        if(is_null($id_programa)){
            $id_programa=0;
        }
        $studProgrami2 = array_unique(\App\Models\StudijskiProgram::lists('ime'));
        $studProgrami = array_merge($anyOption,$studProgrami2);
        $studProgrami = array_values($studProgrami);
        $studProgram = $studProgrami[$id_programa];
        $studProgramiID = array_unique(\App\Models\StudijskiProgram::lists('id'));
        //var_dump($studProgramiID[$id_programa]);

        //letnik               $letnik_id           $letniki            $letnik
        $letnik_id =   \Request::get('letniki');
        if(is_null($letnik_id)){
            $letnik_id=0;
        }
        $letniki2 = array_unique(\App\Models\StudentProgram::lists('letnik'));
        $letniki = array_merge($anyOption,$letniki2);
        $letniki = array_values($letniki);
        $letnik = $letniki[$letnik_id];

        //$programPredmet = Pr::all();
        $predmetNosilec = PredmetNosilec::all();
        $nosilci = Nosilec::all();
        $predmeti = Predmet::all();

        $stStudentov = '';

        //var_dump(\Request::all());
        if(count(\Request::all())==0){
            return \View::make('stanjeVpisaZaPredmete')
                // leto
                ->with('leta', $leta)
                ->with('leto_id', 0)
                // letnik
                ->with('letniki', $letniki)
                ->with('letnik_id', 0)
                // stud program
                ->with('studProgrami', $studProgrami)
                ->with('id_programa', 0)

                ->with('stStudentov', '');
        }

        /*
            SELECT program_predmet.*, student_predmet.id_predmeta, count(*) as total
            FROM student_predmet
            INNER JOIN program_predmet
                ON student_predmet.id_predmeta = program_predmet.id_predmeta
            WHERE ( student_predmet.studijsko_leto = program_predmet.studijsko_leto
                AND student_predmet.letnik = program_predmet.letnik

                AND student_predmet.studijsko_leto = $leto
                AND student_predmet.letnik         = $letnik
                AND program_predmet.id_programa    = $id_programa
                )
            GROUP BY student_predmet.id_predmeta
         * */

        //var_dump($leta);
        //var_dump($leto);
        //var_dump("Letnik");
        //var_dump($letnik);
        //var_dump("Id Programa");
        //var_dump($id_programa);
        //var_dump(intval($id_programa));

        $stStudentov = DB::table('student_predmet')
            ->select('program_predmet.id_programa',
                'student_predmet.*',
                DB::raw('count(*) as total'))
            ->from('student_predmet')
            ->join('program_predmet', function ($join){
                $join->on( 'student_predmet.id_predmeta', '=', 'program_predmet.id_predmeta');
                $join->on( 'student_predmet.studijsko_leto', '=', 'program_predmet.studijsko_leto');
                $join->on( 'student_predmet.letnik', '=', 'program_predmet.letnik');
            })
            ->groupBy('student_predmet.id_predmeta','student_predmet.studijsko_leto','student_predmet.letnik','program_predmet.id_programa');
        //if($leto_id > 0){
            $stStudentov = $stStudentov->where('student_predmet.studijsko_leto','=',$leto);
        //}
        if($letnik_id > 0){
            $stStudentov = $stStudentov->where('student_predmet.letnik','=',$letnik);
        }
        if($id_programa > 0){
            $stStudentov = $stStudentov->where('program_predmet.id_programa','=',$id_programa);
        }
        //var_dump($id_programa);

        $stStudentov = $stStudentov
            ->orderBy('student_predmet.studijsko_leto','desc')
            ->orderBy('program_predmet.id_programa')
            ->orderBy('student_predmet.letnik')
            ->orderBy('total','desc')
            ->orderBy('id_predmeta')
            ->get()
            ;
        /*
        $stStudentov_list = StudentPredmet::all();
        $stStudentov_list = $stStudentov->where('letnik',$leto);
        $stStudentov_list = $stStudentov->where('studijsko_leto',$studijsko_leto);
        $stStudentov_list = $stStudentov->groupBy('letnik','studijsko_leto','id_predmeta');

        $stStudentov = array();

        foreach($stStudentov_list as $stStudent ){
            $stStudentov['id_predmeta'] = $stStudent->id_predmeta;
            $stStudentov['letnik'] = $stStudent->letnik;
            $stStudentov['studijsko_leto'] = $stStudent->studijsko_leto;

        }*/



        //var_dump("Count:");
        //var_dump($stStudentov);

        //$stStudentov=$stStudentov->get();

        $csv = \Input::get('csv');
        $pdf = \Input::get('pdf');
        if(!is_null($csv) || !is_null($pdf)){
            if(!is_null($pdf)){

                $pdf = \App::make('dompdf');
                $pdf->loadHTML(\View::make('pdf/stanjeVpisaZaPredmete_pdf')
                    // leto
                    ->with('leta', $leta)
                    ->with('leto_id', $leto_id)
                    // letnik
                    ->with('letniki', $letniki)
                    ->with('letnik_id', $letnik_id)
                    // stud program
                    ->with('studProgrami', $studProgrami)
                    ->with('id_programa', $id_programa)

                    ->with('predmetNosilec', $predmetNosilec)
                    ->with('nosilci', $nosilci)
                    ->with('predmeti', $predmeti)

                    ->with('stStudentov', $stStudentov)
                );

                return $pdf->download('StanjeVpisaZaPredmete.pdf');
            }
            if(!is_null($csv)) {//!is_null($csv)
                $content[] = ['Šifra', 'Predmet', 'Nosilec', 'Študijsko leto', 'Letnik', 'Program', 'Število vpisanih'];
                foreach ($stStudentov as $s) {


                    $nosilci = $predmetNosilec->find($s->id_predmeta)->nosilec->ime . ' ' . $predmetNosilec->find($s->id_predmeta)->nosilec->priimek;

                    if (isset($predmetNosilec->find($s->id_predmeta)->nosilec2->ime) && isset($predmetNosilec->find($s->id_predmeta)->nosilec2->priimek)) {
                        $nosilci = $nosilci . ', ' . $predmetNosilec->find($s->id_predmeta)->nosilec2->ime . ' ' . $predmetNosilec->find($s->id_predmeta)->nosilec2->priimek;
                    }
                    if (isset($predmetNosilec->find($s->id_predmeta)->nosilec3->ime) && isset($predmetNosilec->find($s->id_predmeta)->nosilec3->priimek)) {
                        $nosilci = $nosilci . ', ' . $predmetNosilec->find($s->id_predmeta)->nosilec3->ime . ' ' . $predmetNosilec->find($s->id_predmeta)->nosilec3->priimek;
                    }

                    $content[] = [
                        $predmeti->find($s->id_predmeta)->sifra,
                        $predmeti->find($s->id_predmeta)->naziv,
                        $nosilci,
                        $s->studijsko_leto,
                        $s->letnik,
                        $studProgrami[$id_programa],
                        $s->total
                    ];
                }
                ExportHelper::make_csv($content, 'Stanje Vpisa', '');
            }
        }


        return \View::make('stanjeVpisaZaPredmete')
            // leto
            ->with('leta', $leta)
            ->with('leto_id', $leto_id)
            // letnik
            ->with('letniki', $letniki)
            ->with('letnik_id', $letnik_id)
            // stud program
            ->with('studProgrami', $studProgrami)
            ->with('id_programa', $id_programa)

            ->with('predmetNosilec', $predmetNosilec)
            ->with('nosilci', $nosilci)
            ->with('predmeti', $predmeti)

            ->with('stStudentov', $stStudentov);


    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
