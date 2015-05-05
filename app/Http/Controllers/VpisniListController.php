<?php namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentPredmet;
use App\Models\StudijskiProgram;
use App\Models\VrstaVpisa;
use App\Models\StudentProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


use DB;
use App\Quotation;



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

        $student = Student::where ('email', '=', (\Session::get('session_id')))->first();
        $vloga = (\Session::get('vloga'));
        if (is_null($student) || $vloga != "student")
        {
            return redirect()->action('WelcomeController@index');
        }
        else
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
                    $letosnjiStudentZadnji = Student::where('vpisna', 'LIKE', $novaVpisna.'%')->orderBy('vpisna')->first();
                    $student->vpisna = $novaVpisna.substr($letosnjiStudentZadnji->vpisna, 4) + 1;
                    $student->save();
                    $program = StudijskiProgram::find($programStudenta->id_programa);
                    // TU SE NE OMEJIM NA STUDIJSKO LETO!
                    $predmetiObvezni = $program->predmeti()->where('tip','=','obvezni')->where('letnik','=',1);
                    $programStudenta->vrsta_vpisa = 1;
                    $vrsta_vpisa = VrstaVpisa::where('sifra', '=', $programStudenta->vrsta_vpisa)->first();
                    $programStudenta->nacin_studija = "redni";
                    $programStudenta->letnik = 1;
                    $programStudenta->save();
                    return view('vpisniList',['student'=>$student , 'empty'=>1, 'programStudenta'=>$programStudenta,
                        'program'=>$program, 'vrsta_vpisa'=> $vrsta_vpisa->ime, 'datum_prvega_vpisa' => date('d.m.Y'), 'predmetiObvezni' => $predmetiObvezni]);

                }
                else
                {
                    $vrsta_vpisa = VrstaVpisa::where('sifra', '=', $programStudenta->vrsta_vpisa)->first();
                    $program = StudijskiProgram::find($programStudenta->id_programa);
                    $prviVpis = $programStudenta->where('id_programa','=',$program->id)->where('id_studenta','=', $student->id)->first();
                    $predmetiObvezni = $program->predmeti()->where('tip','=','obvezni')->where('letnik','=',$programStudenta->letnik);
                    $predmetiStrokovni = $program->strokovni_predmeti($programStudenta->studijsko_leto,$programStudenta->letnik)->get();
                    $predmetiProsti = $program->prosti_predmeti($programStudenta->studijsko_leto,$programStudenta->letnik)->get();
                    $moduli = $program->moduli($programStudenta->studijsko_leto,$programStudenta->letnik)->with('predmeti')->get();
                    $programLetnik = $program->letnik($programStudenta->letnik);

                    return view('vpisniList',['student'=>$student , 'empty'=>1, 'programStudenta'=>$programStudenta,
                        'program'=>$program, 'vrsta_vpisa'=> $vrsta_vpisa->ime, 'datum_prvega_vpisa' => $prviVpis->datum_vpisa,
                        'predmetiObvezni' => $predmetiObvezni, 'predmetiStrokovni'=>$predmetiStrokovni, 'moduli'=>$moduli,
                        'predmetiProsti'=>$predmetiProsti, 'programLetnik'=>$programLetnik]);
                }

            }
            else
            {
                return view ('vpisniList', ['empty' => 0]);
            }
        }



    }

    public function handlerVpisniList(Request $request){
        $id_programa = $request['id'];
        $programStudenta = StudentProgram::find($id_programa);

        //shranimo oz. posodobimo podatke o studentu
        $student = Student::find($request['id_studenta']);

        //validacija imena in priimka
        if (preg_match('/^[a-žA-Ž]+$/', ($request['ime']))  && preg_match('/^[a-žA-Ž]+$/', ($request['ime'])))
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
                        return Redirect::back()->withErrors(['EMŠO se ne ujema s spolom.']);
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
                        return Redirect::back()->withErrors(['EMŠO se ne ujema s spolom.']);
                    }
                    else
                    {
                        $student->emso = $request['emso'];
                    }
                }

            }
            else
            {
                return Redirect::back()->withErrors(['EMŠO se ne ujema z datumom rojstva.']);
            }

        }
        else
        {
            return Redirect::back()->withErrors(['EMŠO mora biti sestavljen iz 13 številk.']);
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
        // 'naslovZacasni', 'obcinaZacasni', 'postaZacasni', 'drzavaZacasni'
        if(!empty($request['naslovZacasni']) && !empty($request['obcinaZacasni']) && !empty($request['postaZacasni']) && !empty($request['drzavaZacasni']))
        {
            $student->naslovZacasni = $request['naslovZacasni'];
            $student->obcinaZacasni = $request['obcinaZacasni'];
            $student->postaZacasni = $request['postaZacasni'];
            $student->drzavaZacasni = $request['drzavaZacasni'];
            if($request['posiljanje']==1){
                $student->posiljanje=1;
            }
        }else{
            if($request['posiljanje']==1){
                return Redirect::back()->withErrors(['Naslov za pošiljanje neveljaven.']);
            }
        }

        //PREDMETNIIK
        $program = $programStudenta->studijski_program;
        dd($program);
        $predmetiStrokovni = $program->strokovni_predmeti($programStudenta->studijsko_leto,$programStudenta->letnik)->with('predmeti')->get();
        $predmetiProsti = $program->prosti_predmeti($programStudenta->studijsko_leto,$programStudenta->letnik)->with('predmeti')->get();
        $moduli = $program->moduli($programStudenta->studijsko_leto,$programStudenta->letnik)->with('predmeti')->get();
        $programLetnik = $program->letnik($programStudenta->letnik);
        //STROKOVNI IZBIRNI

        //MODULSKI PREDMETI

        //PROSTO IZBIRNI PREDMETI

        $student->telefon = $request['telefon'];
        $student->naslov = $request['naslov'];
        $student->davcna = $request['davcna'];
        $student->drzavljanstvo = $request['drzavljanstvo'];
        $student->save();

        //oznacimo, da je zeton izkoriscen
        $programStudenta->vloga_oddana = date('Y-m-d');
        $programStudenta->save();

        return view ('vpisniList', ['empty'=>0]);
    }

    public function seznamVlog(){
        $studentProgrami = StudentProgram::orderBy('vloga_potrjena','asc')->orderBy('studijsko_leto','desc')->get();
        //dd($studentProgrami->first());
        return view('vloge', ['vloge' => $studentProgrami]);
    }

    public function potrdiVlogo($id){
        $vloga = StudentProgram::find((int)$id);
        $studentProgrami = StudentProgram::nepotrjeneVloge();
        $program = StudijskiProgram::find($vloga->id_programa);
        if(!is_null($vloga)){
            $status = $vloga->potrdi();
            if($status){
                $msg = 'Vloga potrjena';
                //+++++++++++shrani se OBVEZNI predmetnik študenta za to študijsko leto++++++++++++++
                $predmeti = $program->predmeti()->where('studijsko_leto','=',$vloga->studijsko_leto)->where('letnik','=', $vloga->letnik)->where('tip','=','obvezni');
                foreach($predmeti->get() as $predmet)
                {
                    StudentPredmet::create(['id_studenta'=>$vloga->id_studenta, 'id_predmeta'=>$predmet->id, 'letnik'=>$vloga->letnik, 'studijsko_leto'=>$vloga->studijsko_leto]);
                }

                return redirect('vloge')->with('odgovor','Vloga potrjena');

            }
        }

        return Redirect::back()->with(['vloge'=>$studentProgrami])->withErrors(['Napaka pri potrjevanju vloge']);
    }

}