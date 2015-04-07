<?php namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudijskiProgram;
use App\Models\StudentProgram;
use App\Models\VrstaVpisa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


use DB;
use App\Quotation;



class VpisniListReferentController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function obrazecVpisniList(){

        return view ('/referent/vpisnilistReferent', ['studentNajden'=>0]);

    }

    public function handlerVpisniList(Request $request)
    {

    }

    public function searchStudent(Request $request)
    {
        $student = Student::where('email', '=', $request['iskalni_niz'])->first();

        if (!is_null($student))
        {
            //$programStudenta = $student->studentProgram()->orderBy('id','desc')->first();

            //preverimo ce obstaja zeton
            $programStudenta = $student->studentProgram()->where('vloga_oddana', '=', null)->first();

            if(!is_null($programStudenta))
            {
                //preverimo za 1.vpis
                if ($student->vpisna == 0)
                {
                    //generiramo vpisno stevilko in jo shranimo
                    $leto = (date('Y'));
                    $leto = substr ($leto, 2);
                    $novaVpisna =  '63'.$leto;
                    $letosnjiStudentZadnji = Student::where('vpisna', 'LIKE', $novaVpisna.'%')->orderBy('vpisna','desc')->first();
                    $student->vpisna = $novaVpisna.substr($letosnjiStudentZadnji->vpisna, 4) + 1;
                    $student->save();
                    $program = StudijskiProgram::find($programStudenta->id_programa);
                    $predmetiObvezni = $program->predmeti()->where('tip','=','obvezni')->where('letnik','=',1);
                    $programStudenta->vrsta_vpisa = 1;
                    $vrsta_vpisa = VrstaVpisa::where('sifra', '=', $programStudenta->vrsta_vpisa)->first();
                    $programStudenta->nacin_studija = "redni";
                    $programStudenta->letnik = 1;
                    $programStudenta->save();
                    return view('/referent/vpisnilistReferent',['student'=>$student , 'studentNajden'=>1, 'empty'=>1, 'programStudenta'=>$programStudenta,
                        'program'=>$program, 'vrsta_vpisa'=> $vrsta_vpisa->ime, 'datum_prvega_vpisa' => date('Y-m-d'), 'predmetiObvezni' => $predmetiObvezni]);

                }
                else
                {
                    $vrsta_vpisa = VrstaVpisa::where('sifra', '=', $programStudenta->vrsta_vpisa)->first();
                    $program = StudijskiProgram::find($programStudenta->id_programa);
                    $prviVpis = $programStudenta->where('id_programa','=',$program->id)->where('id_studenta','=', $student->id)->first();
                    $predmetiObvezni = $program->predmeti()->where('tip','=','obvezni')->where('letnik','=',$programStudenta->letnik);

                    return view('/referent/vpisnilistReferent',['student'=>$student , 'studentNajden'=>1, 'empty' => 1, 'programStudenta'=>$programStudenta,
                        'program'=>$program, 'vrsta_vpisa'=> $vrsta_vpisa->ime, 'datum_prvega_vpisa' => $prviVpis->datum_vpisa, 'predmetiObvezni' => $predmetiObvezni]);
                }
            }
            else
            {
                return view ('/referent/vpisnilistReferent', ['student'=>$student , 'studentNajden'=>1, 'empty' => 0]);
            }

        }
        else
        {
            return Redirect::back()->withErrors(['Napačna vpisna številka.']);
        }

    }

}