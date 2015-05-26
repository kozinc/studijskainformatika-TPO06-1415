<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Modul;
use App\Models\ProgramLetnik;
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

        $modul_array = array();
        foreach($moduli as $modul){
            $modul_array[$modul->ime] = 0;
        }
        foreach ($student_list as $sp) {
            foreach($leta as $leto) {
                if ($sp->studijsko_leto == $leto) {
                    foreach ($letniki as $letnik) {
                        if($sp->letnik == $letnik) {
                            foreach ($programi as $program) {
                                if($sp->id_programa == $program->id) {
                                    foreach ($sp->moduli($leto, $sp)->get() as $modul1) {
                                        $modul_array[$modul1->ime] = $modul_array[$modul1->ime] + 1;
        }   }   }   }   }   }   }   }

        return \View::make('stanjeVpisa')
            ->with('programi', $programi)
            ->with('stStudentov', $stStudentov)
            ->with('leta', $leta)
            ->with('leto_id', 0)
            ->with('programLetniki', $programLetnik)
            ->with('moduli', $moduli)
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
        $leta= array_unique(\App\Models\StudentProgram::lists('studijsko_leto'));
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
        $programLetniki = ProgramLetnik::all()->keyBy('id');
        $moduli = DB::table('modul')
            ->select('id_programa','ime','letnik')
            ->groupBy('ime')
            ->get();
        $query = StudentProgram::query();
        $student_list = $query->get();

        $modul_array = array();
        foreach($moduli as $modul){
            $modul_array[$modul->ime] = 0;
        }
        foreach ($student_list as $sp) {
            foreach($leta as $leto) {
                if ($sp->studijsko_leto == $leto) {
                    foreach ($letniki as $letnik) {
                        if($sp->letnik == $letnik) {
                            foreach ($programi as $program) {
                                if($sp->id_programa == $program->id) {
                                    foreach ($sp->moduli($leto, $sp)->get() as $modul1) {
                                        $modul_array[$modul1->ime] = $modul_array[$modul1->ime] + 1;
                                    }   }   }   }   }   }   }   }
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
                                    if($programLetnik->stevilo_modulov > 0) {
                                        $content[] = ['', '', 'Modul', 'Število študentov', '', '', '', ''];
                                        foreach ($moduli as $modul) {
                                            if ($modul_array[$modul->ime] > 0) {
                                                // $modul->ime
                                                // $modul_array[$modul->ime]
                                                $content[] = ['', '', $modul->ime, $modul_array[$modul->ime], '', '', '', ''];
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
        return Redirect::back();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
