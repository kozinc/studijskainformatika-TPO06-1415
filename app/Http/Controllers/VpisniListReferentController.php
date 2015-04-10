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

    public function searchStudent(Request $request)
    {
        $search = $request['iskalni_niz'];
        $student = Student::where('vpisna', 'LIKE', '%'.$search.'%')->orWhere('ime', 'LIKE', $search.'%')->orWhere('priimek', 'LIKE', $search.'%')->first();


        if (!is_null($student))
        {
            return Redirect('/vpisnilistReferent/'.$student->id);
        }
        return Redirect::back();
    }

    public function ponoviVlogo($id)
    {
        $student = Student::find($id);
        $programStudenta = $student->studentProgram()->orderBy('id','desc')->first();
        $programStudenta->vloga_oddana = null;
        $programStudenta->vloga_potrjena = null;
        $programStudenta->save();

        return Redirect::back();
    }


    public function prikaziStudenta($id)
    {
        $student = Student::find($id);

        if (!is_null($student))
        {

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
                    $vrste_vpisa = VrstaVpisa::all();
                    $programStudenta->nacin_studija = "redni";
                    $programStudenta->letnik = 1;
                    $programStudenta->save();
                    return view('/referent/vpisnilistReferent',['student'=>$student , 'studentNajden'=>1, 'empty'=>1, 'programStudenta'=>$programStudenta,
                        'program'=>$program, 'vrste_vpisa'=> $vrste_vpisa, 'vrsta_vpisa'=> $vrsta_vpisa->ime, 'datum_prvega_vpisa' => date('Y-m-d'), 'predmetiObvezni' => $predmetiObvezni]);

                }
                else
                {
                    $vrsta_vpisa = VrstaVpisa::where('sifra', '=', $programStudenta->vrsta_vpisa)->first();
                    $program = StudijskiProgram::find($programStudenta->id_programa);
                    $vrste_vpisa = VrstaVpisa::all();
                    $prviVpis = $programStudenta->where('id_programa','=',$program->id)->where('id_studenta','=', $student->id)->first();
                    $predmetiObvezni = $program->predmeti()->where('tip','=','obvezni')->where('letnik','=',$programStudenta->letnik);

                    return view('/referent/vpisnilistReferent',['student'=>$student , 'studentNajden'=>1, 'empty' => 1, 'programStudenta'=>$programStudenta,
                        'program'=>$program, 'vrste_vpisa'=> $vrste_vpisa, 'vrsta_vpisa'=> $vrsta_vpisa->ime, 'datum_prvega_vpisa' => $prviVpis->datum_vpisa, 'predmetiObvezni' => $predmetiObvezni]);
                }
            }
            else
            {
                $sporocilo = "Žeton študenta za vpis je izkoriščen. Ali ponovno odprem vpis?";
                return view ('/referent/vpisnilistReferent', ['student'=>$student , 'studentNajden'=>1, 'empty' => 0, 'sporocilo'=> $sporocilo]);
            }

        }
        else
        {
            return Redirect::back()->withErrors(['Napačen email.']);
        }

    }

    public function handlerVpisniList(Request $request)
    {
        $id_programa = $request['id'];
        $programStudenta = StudentProgram::find($id_programa);

        //shranimo oz. posodobimo podatke o studentu
        $student = Student::find($request['id_studenta']);

        //validacija imena inj priimka
        if (ctype_alpha ($request['ime']) && ctype_alpha($request['priimek']))
        {
            $student->ime = $request['ime'];
            $student->priimek = $request['priimek'];
        }
        else
        {
            return Redirect::back()->withErrors(['Ime in priimek naj vsebujeta le črke.']);
        }

        //validacija datuma rojstva
        if (!strtotime($request['datum_rojstva']))
        {
            return Redirect::back()->withErrors(['Neveljaven datum rojstva!']);
        }
        else
        {
            $student->datum_rojstva = date('Y-m-d', strtotime($request['datum_rojstva']));
        }
        if (($request['spol'] == "ženski") || ($request['spol'] == "moški"))
        {
            $student->spol = $request['spol'];
        }
        else
        {
            return Redirect::back()->withErrors(['Spol ni pravilno označen! Napiši "moški" oz. "ženski". ']);
        }

        //validacija EMSO
        if (is_numeric($request['emso']) && strlen($request['emso']) == 13)
        {

            //primerjaj z datumom rojstva
            if ( (substr($request['emso'], 0, 2) == date('d', strtotime($student->datum_rojstva)) ) &&
                (substr($request['emso'], 2, 2) == date('m', strtotime($student->datum_rojstva)) ) &&
                (substr($request['emso'], 4, 3) == substr(date('Y', strtotime($student->datum_rojstva)), 1, 3) ) )
            {
                //primerjaj s spolom
                if ($student->spol == "ženski")
                {
                    if (substr($request['emso'], 7, 3) != "505")
                    {
                        return Redirect::back()->withErrors(['EMSO se ne ujema s spolom.']);
                    }
                    else
                    {
                        $student->emso = $request['emso'];
                    }
                }
                elseif ($student->spol == "moški")
                {
                    if (substr($request['emso'], 7, 3) != "500")
                    {
                        return Redirect::back()->withErrors(['EMSO se ne ujema s spolom.']);
                    }
                    else
                    {
                        $student->emso = $request['emso'];
                    }
                }

            }
            else
            {
                return Redirect::back()->withErrors(['EMSO se ne ujema z datumom rojstva.']);
            }

        }
        else
        {
            return Redirect::back()->withErrors(['EMSO mora biti sestavljen iz 13 številk.']);
        }

        //Validacija drzave rojstva in skladnosti drzave in obcine rojstva
        if (!is_null(DB::table('drzava')->where('naziv', $request['drzava_rojstva'])->first()))
        {
            if (DB::table('drzava')->where('naziv', $request['drzava_rojstva'])->first()->naziv == "Slovenija")
            {
                if (!is_null(DB::table('obcina')->where('naziv', $request['obcina_rojstva'])->first()))
                {
                    $student->drzava_rojstva = $request['drzava_rojstva'];
                    $student->obcina_rojstva = $request['obcina_rojstva'];
                }
                else
                {
                    return Redirect::back()->withErrors(['Občina se ne ujema z državo.']);

                }
            }
            else
            {
                $student->drzava_rojstva = $request['drzava_rojstva'];
                $student->obcina_rojstva = $request['obcina_rojstva'];
            }
        }
        else
        {
            return Redirect::back()->withErrors(['Država rojstva ne obstaja.']);
        }

        //Validacija obstoja drzave, obcine in poste.
        if (!is_null(DB::table('drzava')->where('naziv', $request['drzava'])->first()) &&
            !is_null(DB::table('obcina')->where('naziv', $request['obcina'])->first()) &&
            !is_null(DB::table('posta')->where('postna_stevilka', $request['posta'])->first()) )
        {
            $student->obcina = $request['obcina'];
            $student->posta = $request['posta'];
            $student->drzava = $request['drzava'];
        }
        else
        {
            return Redirect::back()->withErrors(['Neveljavna država / neveljavna občina / neveljavna poštna številka!']);
        }

        $student->telefon = $request['telefon'];
        $student->naslov = $request['naslov'];
        $student->davcna = $request['davcna'];
        $student->drzavljanstvo = $request['drzavljanstvo'];
        $student->save();

        //oznacimo, da je zeton izkoriscen

        $programStudenta->vrsta_vpisa = $request['vrsta_vpisa'];
        $programStudenta->nacin_studija = $request['nacin_studija'];
        $programStudenta->vloga_oddana = date('Y-m-d');
        $programStudenta->vloga_potrjena = date('Y-m-d');
        $programStudenta->datum_vpisa = date('Y-m-d');
        $programStudenta->save();
        $sporocilo = "Vloga uspešno oddana in potrjena.";

        return view ('/referent/vpisnilistReferent', ['student'=>$student , 'studentNajden'=>1, 'empty' => 0,'sporocilo'=> $sporocilo]);
    }

}