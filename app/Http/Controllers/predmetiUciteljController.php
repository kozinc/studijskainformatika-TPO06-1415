<?php namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        $studijsko_leto = '2014/2015';
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
        $studijsko_leto = "2014/2015";
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
            if ($ir->datum > date('Y-m-d',strtotime('-30 days')) && ($ir->datum <= date('Y-m-d')))
            {
                $datumi[] = $ir->datum;
            }

        }
        return view('vnosOceneUcitelj', ['predmet'=>Predmet::find($id_predmeta), 'student'=>Student::find($id_studenta), 'datumi'=>$datumi]);
    }
}