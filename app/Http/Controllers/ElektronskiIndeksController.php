<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Predmet;
use App\Models\ProgramLetnik;
use App\Models\StudentPredmet;
use App\Models\Student;
use App\Models\StudentProgram;
use App\Models\StudijskiProgram;
use Illuminate\Http\Request;
use App\Helpers\ExportHelper;
use Illuminate\Support\Facades\Redirect;


class ElektronskiIndeksController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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

    public function prikazEIndeks($stud)
    {
        if (is_null($stud))
        {
            $student = Student::where ('email', '=', (\Session::get('session_id')))->first();
        }
        else
        {
            $student = Student::find($stud);
        }


        $vloga = (\Session::get('vloga'));

        if (is_null($student))
        {

            return redirect()->action('WelcomeController@index');
        }
        else
        {
            //studijski program    $id_programa         $studProgrami       $studProgram
            //$id_programa = 0;
            $studProgrami = StudijskiProgram::all();
            //$studProgram = $studProgrami[$id_programa];

            $programiStudenta = $student->studentProgram()->whereNotNull('vloga_potrjena')->get();
            $programiStudenta = $programiStudenta->sortBy('vloga_potrjena');
            $predmeti = StudentPredmet::where('id_studenta','=',$student->id);
            return view('elektronskiIndeks', ['student'=>$student,
                                              'programi'=>$programiStudenta,
                                              'predmeti'=>$predmeti,
                                              'studProgrami'=>$studProgrami]);
        }

    }

    public function export(Request $request)
    {
        //tu ne sme biti iz seje
        $student = Student::find($request['id_studenta']);
        $id_programa = $request['id_programa'];
        $programiStudenta = $student->studentProgram()->whereNotNull('vloga_potrjena')->get();
        $programiStudenta = $programiStudenta->sortBy('vloga_potrjena');
        $predmeti = StudentPredmet::where('id_studenta','=',$student->id);
        $studProgram = StudijskiProgram::where('id','=',$id_programa)->first();
        var_dump($studProgram->ime);

        if(isset($request['pdf']))
        {
            $pdf = \App::make('dompdf');
            ini_set('max_execution_time', 300);
            $pdf->loadHTML(\View::make('pdf/elektronskiIndeks_pdf')
                ->with('student', $student)
                ->with('programi', $programiStudenta)
                ->with('predmeti', $predmeti)
                ->with('studProgram',$studProgram)
                ->with('id_programa',$id_programa)
            );
            return $pdf->download('elektronskiIndeks.pdf');
        }
        elseif (isset($request['csv']))
        {
            $title = 'Elektronski Indeks';
            $steviloSkupaj = 0;
            $ocenaSkupaj = 0;
            $ktSkupaj = 0;
            $content[] = ['Šifra predmeta', 'Naziv predmeta', 'Nosilec', 'KT', 'Datum polaganja','Polaganje', 'Polaganje v tekočem št. letu', 'Ocena'];

            foreach($programiStudenta as $program)
            {
                $kt = 0;
                $povpOcena = 0;
                $stevilo = 0;
                if($id_programa == $program->id_programa)
                {
                    foreach($predmeti->get() as $predmet)
                    {
                        if($predmet->studijsko_leto == $program->studijsko_leto)
                        {
                            $stevec = 0;
                            $trenutniDatum=$student->polaganja()->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first();
                            if($trenutniDatum!=null)
                            {
                                $trenutniDatum=$trenutniDatum->datum;
                            }

                            foreach ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum') as $datumIzpita)
                            {
                                if ($datumIzpita->datum <= $trenutniDatum)
                                {
                                    $stevec++;
                                }
                            }
                            $datumPolaganja = (($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':date('d.m.Y',strtotime($student->polaganja()->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first()->datum));
                            $polaganjaLetos = (($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->count();
                            $ocena = (($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena;
                            if ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first() != null)
                            {
                                if ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena > 5)
                                {
                                    $kt=$kt+$predmet->predmet->KT;
                                    $ktSkupaj=$ktSkupaj+$predmet->predmet->KT;
                                    $povpOcena=$povpOcena+$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena;
                                    $ocenaSkupaj=$ocenaSkupaj+$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena;
                                    $stevilo++;
                                    $steviloSkupaj++;

                                }
                            }
                            $nosilciImena = $predmet->predmet->nosilec->ime.' '.$predmet->predmet->nosilec->priimek;
                            if($predmet->predmet->nosilec2!=null){
                                $nosilciImena .= ', '.$predmet->predmet->nosilec2->ime.' '.$predmet->predmet->nosilec2->priimek;
                            }
                            if($predmet->predmet->nosilec3!=null){
                                $nosilciImena .= ', '.$predmet->predmet->nosilec3->ime.' '.$predmet->predmet->nosilec3->priimek;
                            }
                            if ($ocena > 5) {
                                $content[] = [$predmet->predmet->sifra, $predmet->predmet->naziv, $nosilciImena, $predmet->predmet->KT, $datumPolaganja, $stevec, $polaganjaLetos, $ocena];
                            }
                        }
                    }
                }
            }
            $content[] = ['', '', '', '', '','', '', ''];

            $content[] = ['Študijsko leto', 'Število opravljenih izpitov', 'Kreditne točke','Skupna povprečna ocena','','',''];
            foreach($programiStudenta as $program)
            {
                $kt = 0;
                $povpOcena = 0;
                $stevilo = 0;

                foreach($predmeti->get() as $predmet)
                {
                    if($predmet->studijsko_leto == $program->studijsko_leto && $id_programa == $program->id_programa)
                    {
                        $stevec = 0;
                        $trenutniDatum=$student->polaganja()->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first();
                        if($trenutniDatum!=null)
                        {
                            $trenutniDatum=$trenutniDatum->datum;
                        }

                        foreach ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum') as $datumIzpita)
                        {
                            if ($datumIzpita->datum <= $trenutniDatum)
                            {
                                $stevec++;
                            }
                                    }
                        $datumPolaganja = (($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':date('d.m.Y',strtotime($student->polaganja()->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first()->datum));
                        $polaganjaLetos = (($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->count();
                        $ocena = (($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena;
                        if ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first() != null)
                        {
                            if ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena > 5)
                            {
                                $kt=$kt+$predmet->predmet->KT;
                                //$ktSkupaj=$ktSkupaj+$predmet->predmet->KT;
                                $povpOcena=$povpOcena+$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena;
                                //$ocenaSkupaj=$ocenaSkupaj+$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena;
                                $stevilo++;
                                //$steviloSkupaj++;

                            }
                        }
                    }
                }
                if($stevilo>0){
                    $content[] = [$predmet->studijsko_leto,$stevilo, $kt, (($stevilo==0)?'':number_format((float)($povpOcena/$stevilo), 2, '.', '')),'','','',''];
                }
            }
            //Število opravljenih izpitov	Kreditne točke	Skupna povprečna ocena
            $content[] = ['', '','','','',''];
            $content[] = ['Število opravljenih izpitov', 'Kreditne točke','Skupna povprečna ocena','','',''];
            $content[] = [$steviloSkupaj, $ktSkupaj,($steviloSkupaj==0)?'':number_format((float)($ocenaSkupaj/$steviloSkupaj), 3, '.', ''),'','',''];

            return ExportHelper::make_csv($content, $title, '');
        }
        return Redirect::back();

    }

}
