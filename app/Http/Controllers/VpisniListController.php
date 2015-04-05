<?php namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudijskiProgram;
use App\Models\StudentProgram;
use Illuminate\Http\Request;



class VpisniListController extends Controller {

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

        $student = Student::where ('email', '=', 'janeznovak@gmail.com')->first();


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
                $predmetiObvezni = $program->predmeti()->where('tip','=','obvezni')->where('letnik','=',$programStudenta->letnik);
                $programStudenta->vrsta_vpisa = "Prvi vpis v 1.letnik";
                $programStudenta->nacin_studija = "redni";
                $programStudenta->letnik = 1;
                return view('vpisnilist',['student'=>$student , 'empty'=>1, 'programStudenta'=>$programStudenta,
                    'program'=>$program, 'datum_prvega_vpisa' => date('Y-m-d'), 'predmetiObvezni' => $predmetiObvezni]);

            }
            else
            {
                $program = StudijskiProgram::find($programStudenta->id_programa);
                $prviVpis = $programStudenta->where('id_programa','=',$program->id)->first();
                $predmetiObvezni = $program->predmeti()->where('tip','=','obvezni')->where('letnik','=',$programStudenta->letnik);

                return view('vpisnilist',['student'=>$student , 'empty'=>1, 'programStudenta'=>$programStudenta,
                    'program'=>$program, 'datum_prvega_vpisa' => $prviVpis->datum_vpisa, 'predmetiObvezni' => $predmetiObvezni]);
            }

        }
        else
        {
            return view ('vpisnilist', ['empty' => 0]);
        }


    }

    public function handlerVpisniList(Request $request){
        $id_programa = $request['id'];
        $programStudenta = StudentProgram::find($id_programa);

        //oznacimo, da je zeton izkoriscen
        $programStudenta->vloga_oddana = date('Y-m-d');
        $programStudenta->save();

        //shranimo oz. posodobimo podatke o studentu
        $student = Student::find($request['id_studenta']);
        $student->ime = $request['ime'];
        $student->priimek = $request['priimek'];
        $student->spol = $request['spol'];
        $student->telefon = $request['telefon'];
        $student->emso = $request['emso'];
        $student->naslov = $request['naslov'];
        $student->kraj = $request['kraj'];
        $student->posta = $request['posta'];
        $student->drzava = $request['drzava'];
        $student->datum_rojstva = $request['datum_rojstva'];
        $student->obcina_rojstva = $request['obcina_rojstva'];
        $student->drzava_rojstva = $request['drzava_rojstva'];
        $student->davcna = $request['davcna'];
        $student->drzavljanstvo = $request['drzavljanstvo'];
        $student->save();

        return view ('vpisnilist', ['empty'=>0]);
    }

}