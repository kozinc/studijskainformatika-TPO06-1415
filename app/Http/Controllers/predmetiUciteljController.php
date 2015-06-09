<?php namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\IzpitniRok;
use App\Models\StudentProgram;
use App\Models\StudijskiProgram;
use App\Models\VrstaVpisa;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Nosilec;
use App\Models\Predmet;
use App\Models\StudentPredmet;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\ExportHelper;


class PredmetiUciteljController extends Controller
{
    public function index()
    {
        //
    }

    public function vrniPredmete()
    {
        $studijsko_leto = '2015/2016';
        $vloga = (\Session::get('vloga'));

        if ($vloga != 'ucitelj')
        {

            return redirect()->action('WelcomeController@index');
        }
        else
        {
            $ucitelj = Nosilec::where('email','=',(\Session::get('session_id')))->first();
            $predmeti = Predmet::where('id_nosilca','=',$ucitelj->id)->orWhere('id_nosilca2','=',$ucitelj->id)->orWhere('id_nosilca3','=',$ucitelj->id);

            return view('predmetiUcitelj', ['ucitelj'=>$ucitelj, 'predmeti'=>$predmeti,'studijsko_leto'=>$studijsko_leto]);
        }
    }

    public function vrniStudente($id_predmeta)
    {
        $predmet = Predmet::find($id_predmeta);
        $studijsko_leto = "2015/2015";
        $studentPredmeti = \App\Models\StudentPredmet::with('student')->where('id_predmeta', $id_predmeta)->where('studijsko_leto', "=", "2014/2015")->get();
        $studenti = [];
        foreach($studentPredmeti as $sp)
        {
            $studenti[] = $sp->student;
        }
        return view('student/iskanjeStudenta', ['studenti'=>$studenti, 'vnosOcene'=>1, 'predmet'=>$predmet,'studijsko_leto'=>$studijsko_leto]);
    }

    public function vnesiOceno($id_predmeta, $id_studenta)
    {
        $pisaniIzpitniRoki = Student::find($id_studenta)->polaganja()->where('id_predmeta','=', $id_predmeta);
        $datumi = [];
        foreach ($pisaniIzpitniRoki->get() as $ir)
        {
            //$ir->datum > date('Y-m-d',strtotime('-30 days'))
            if (($ir->pivot->ocena == 0) && ($ir->datum <= date('Y-m-d')))
            {
                $datumi[] = $ir->datum;
            }

        }
        return view('vnosOceneUcitelj', ['predmet'=>Predmet::find($id_predmeta), 'student'=>Student::find($id_studenta), 'datumi'=>$datumi]);
    }

    //shrani oceno v StudentPredmet (zadnje študijsko leto) in če je vezano na datum, še v StudentIzpit
    public function obdelajObrazecOcena(Request $request)
    {
        $student = Student::where('vpisna','=',$request['vpisna'])->first();
        $predmet = Predmet::where('sifra','=',$request['sifra'])->first();
        $ocena = $request['ocena'];
        if (is_numeric($ocena) && $ocena > 0 && $ocena < 11)
        {
            $sp = StudentPredmet::where('id_studenta','=',$student->id)->where('id_predmeta','=',$predmet->id)->orderBy('id','desc')->first();
            $sp->ocena = $ocena;
            //Če je vezano na kak datum, zapišem še tja:
            $datum = $request['datum'];
            if ($datum == "brez_prijave")
            {
                if (date('Y-m-d', strtotime($request['datum_vnosa'])) > date ('Y-m-d'))
                {
                    return Redirect::back()->withErrors(['Datum vnosa ocene ne sme biti večji od današnjega.']);
                }
                else
                {
                    $sp->datum_vnosa_ocene = date('Y-m-d', strtotime($request['datum_vnosa']));
                }
            }
            else
            {
                $sp->datum_vnosa_ocene = date('Y-m-d');
            }
            $sp->save();
            //Če je vezano na kak datum, zapišem še tja:
            $datum = $request['datum'];
            if ($datum != "brez_prijave")
            {
                $datum = date('Y-m-d',strtotime($datum));
                $izpitni_rok = IzpitniRok::where('id_predmeta','=',$predmet->id)->where('datum','=',$datum)->first();
                $st_izp = \DB::table('student_izpit')->where('id_studenta','=',$student->id)->where('id_izpitnega_roka','=',$izpitni_rok->id)->update(array('ocena'=>$ocena));
                $st_izp = \DB::table('student_izpit')->where('id_studenta','=',$student->id)->where('id_izpitnega_roka','=',$izpitni_rok->id)->update(array('datum_vnosa_ocene'=>date ('Y-m-d')));
            }
        }
        else
        {
            return Redirect::back()->withErrors(['Neveljavna ocena.']);
        }
        $studentProgrami= $student->studentProgram;
        $vrsteVpisa = VrstaVpisa::all();
        $predmeti = null;
        $ucitelj = null;

        if (\Session::get('vloga') == "ucitelj" )
        {
            $ucitelj = Nosilec::where('email','=',\Session::get('session_id'))->first();
            $studentPredmeti = StudentPredmet::with('predmet')->where('id_studenta','=',$student->id)->get();

            $predmeti = $studentPredmeti->filter(function($sp) use ($ucitelj)
            {
                return $sp->predmet->id_nosilca == $ucitelj->id;

            })->values();
            return view('student/studentInfo', ['student'=>$student, 'studentProgrami'=>$studentProgrami, 'vrsteVpisa'=>$vrsteVpisa, 'predmeti'=>$predmeti,'ucitelj'=>$ucitelj]);

        }
        else
        {
            return Redirect(action('StudentController@searchForm'));
        }

    }
}