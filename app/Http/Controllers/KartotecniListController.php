<?php namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\StudentProgram;
use App\Models\StudijskiProgram;
use App\Models\VrstaVpisa;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentPredmet;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\ExportHelper;

class KartotecniListController extends Controller
{
    public function index()
	{
		//
	}

    public function prikazKartotecniList($stud=null)
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

            $programiStudenta = $student->studentProgram()->whereNotNull('vloga_potrjena')->get();
            $programiStudenta = $programiStudenta->sortBy('vloga_potrjena');
            $predmeti = StudentPredmet::where('id_studenta','=',$student->id);
            return view('kartotecniList', ['student'=>$student, 'programi'=>$programiStudenta, 'predmeti'=>$predmeti]);
        }

    }

    public function export(Request $request)
    {
        //tu ne sme biti iz seje
        $student = Student::find($request['id_studenta']);
        $programiStudenta = $student->studentProgram()->whereNotNull('vloga_potrjena')->get();
        $programiStudenta = $programiStudenta->sortBy('vloga_potrjena');
        $predmeti = StudentPredmet::where('id_studenta','=',$student->id);

        if(isset($request['pdf']))
        {
            $pdf = \App::make('dompdf');
            ini_set('max_execution_time', 300);
            if ($request['vsa_polaganja'] == 0)
            {
                $pdf->loadHTML(\View::make('pdf/kartotecniList_pdf')->with('student', $student)->with('programi', $programiStudenta)->with('predmeti', $predmeti));

            }
            else
            {
                $pdf->loadHTML(\View::make('pdf/kartotecniList_pdf2')->with('student', $student)->with('programi', $programiStudenta)->with('predmeti', $predmeti));

            }
            return $pdf->download('kartotecniList.pdf');
        }
        elseif (isset($request['csv']))
        {
            $title = 'Kartotečni list';
            $steviloSkupaj = 0;
            $ocenaSkupaj = 0;
            $ktSkupaj = 0;
            foreach($programiStudenta as $program)
            {
                $content[] = ['Program: '.$program->studijski_program->ime, '', '', '', '', '', '',''];
                $content[] = ['Letnik: '.$program->letnik, '', '', '', '', '', '',''];
                $content[] = ['Vrsta vpisa: '.$program->vrstaVpisa->ime, '', '', '', '', '', '',''];
                $content[] = ['Način študija: '.$program->nacin_studija, '', '', '', '', '', '',''];
                $content[] = ['Šifra predmeta', 'Naziv predmeta', 'Nosilec [šifra]', 'KT', 'Datum polaganja','Polaganje', 'Polaganje v tekočem št. letu', 'Ocena'];
                $kt = 0;
                $povpOcena = 0;
                $stevilo = 0;

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


                    $content[] = [$predmet->predmet->sifra, $predmet->predmet->naziv, $predmet->predmet->nosilec->ime.' '.$predmet->predmet->nosilec->priimek.' ['.$predmet->predmet->id_nosilca.']', $predmet->predmet->KT, $datumPolaganja, $stevec, $polaganjaLetos, $ocena];
                    }
                }
                $content[] = ['Povprečna ocena: ', '','','','',''];
                $content[] = ['KT: '.$kt, '','','','',''];

                $content[] = ['', '', '', '', '', '', '',''];
            }

            $content[] = ['Skupna povprečna ocena: '.(($steviloSkupaj==0)?'':number_format((float)($ocenaSkupaj/$steviloSkupaj), 3, '.', '')), '','','','',''];
            $content[] = ['KT: '.$ktSkupaj, '','','','',''];

            return ExportHelper::make_csv($content, $title, '');
        }
        return Redirect::back();

    }


}