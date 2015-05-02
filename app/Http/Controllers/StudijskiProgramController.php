<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use App\Models\ProgramLetnik;
use App\Models\StudijskiProgram;
use App\Models\Predmet;
use App\Models\Modul;
use Illuminate\Http\Request;

class StudijskiProgramController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$programi = StudijskiProgram::all();

        return view('program/programi', ['programi'=>$programi]);
        
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
		$program = StudijskiProgram::find((int)$id);
        $studijska_leta = $program->studijska_leta();
        return view('program/program', ['program'=>$program, 'studijska_leta'=>$studijska_leta]);
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
	public function update($id, Request $request)
	{
		$program = StudijskiProgram::find($id);
        if(strlen($request['ime']) < 4){
            return Redirect::back()->withErrors('Ime mora vsebovati vsaj 4 znake!');
        }
        if(strlen($request['oznaka']) < 4) {
            return Redirect::back()->withErrors('Oznaka mora vsebovati vsaj 4 znake!');
        }
        if($request['stevilo_semestrov'] < 1){
            return Redirect::back()->withErrors('Število semestrov mora biti večje od 0!');
        }
        $program->oznaka = $request['oznaka'];
        $program->stopnja = $request['stopnja'];
        $program->stevilo_semestrov = $request['stevilo_semestrov'];
        $program->klasius_srv = $request['klasius'];
        $program->save();
        return Redirect::back()->with('odgovor', 'Program uspešno posodobljen.');

	}

    public function spremeni_strukturo($id, Request $request)
    {
        $program = StudijskiProgram::find($id);
        $letniki = $program->letniki;
        $trajanje = 1;
        $vsota_KT = $vsota_obveznih = $vsota_strokovnih = $vsota_prostih = $vsota_modulov = 0;
        for($i=1; $i <= 5; $i++){
            $letnik = $letniki->filter(function($item) use($i){
                return $item->letnik == $i;
            })->first();
            if($request['status-'.$i] == "delete" && !is_null($letnik)){
                $letnik->destroy($letnik->id);
            }elseif($request['status-'.$i] == "create"){
                $trajanje = $i;

                if(is_null($letnik)){
                   $letnik = new ProgramLetnik();
                   $letnik->id_programa = $id;
                   $letnik->letnik = $i;
                }
                $letnik->KT = $request['KT_'.$i];

                $letnik->stevilo_obveznih_predmetov = $request['obvezni_predmeti_'.$i];
                $letnik->stevilo_strokovnih_predmetov = $request['strokovni_predmeti_'.$i];
                $letnik->stevilo_prostih_predmetov = $request['prosti_predmeti_'.$i];
                $letnik->stevilo_modulov = $request['moduli_'.$i];
                $letnik->save();

                $vsota_KT += $letnik->KT;
                $vsota_obveznih += $letnik->stevilo_obveznih_predmetov;
                $vsota_strokovnih += $letnik->stevilo_strokovnih_predmetov;
                $vsota_prostih += $letnik->stevilo_prostih_predmetov;
                $vsota_modulov += $letnik->stevilo_modulov;
            }

        }
        $program->trajanje_leta = $trajanje;
        $program->KT = $vsota_KT;
        $program->stevilo_obveznih_predmetov = $vsota_obveznih;
        $program->stevilo_strokovnih_predmetov = $vsota_strokovnih;
        $program->stevilo_prostih_predmetov = $vsota_prostih;
        $program->stevilo_modulov = $vsota_modulov;
        $program->save();

        return Redirect::back()->with('odgovor','Struktura programa uspešno posodoboljena.');
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

    public function showPredmetnik($id, $studijsko_leto){
        $leto = substr($studijsko_leto,0,4);
        $stud_leto = $leto.'/'.((int)$leto + 1);
        $program = StudijskiProgram::find((int)$id);
        $predmeti = Predmet::all();
        return view('program/programPredmetnik',['program'=>$program, 'predmeti'=>$predmeti, 'studijsko_leto'=>$stud_leto] );
    }

    public function editPredmetnik($id, $studijsko_leto, Request $request){
        $program = StudijskiProgram::find((int)$id);
        $leto = substr($studijsko_leto,0,4);
        $sl = $leto.'/'.((int)$leto+1);
        $predmet = Predmet::find($request['predmet']);
        $id_modula = null;
        if($request['modul'] == 'new' && !isset($request['delete'])){
            $modul = new Modul();
            if(strlen($request['ime_modula']) < 4){
                return Redirect::back()->withErrors('Ime modula je prekratko!');
            }
            $modul->ime = $request['ime_modula'];
            $modul->opis = $request['opis_modula'];
            $modul->letnik = $request['letnik'];
            $modul->studijsko_leto = $sl;
            $modul->id_programa = $id;
            $modul->save();
            return Redirect::back()->with('odgovor', 'Modul uspešno dodan.');
        }
        if($request['tip']=='modulski'){
            if(intval($request['modul']) > 0){
                $id_modula = (int)$request['modul'];
                if(isset($request['delete'])){
                    $modul = Modul::find($id_modula);
                    $modul->delete();
                    Modul::deleting(function($mod)
                    {
                        $mod->predmeti()->detach();
                    });
                }
            }else{
                return Redirect::back()->withErrors('Neveljaven modul!');
            }
        }
        $existingPredmet = $program->predmeti()->where('predmet.id','=',$request['predmet'])->wherePivot('studijsko_leto','LIKE', $leto.'%')->first();
        if(is_null($existingPredmet)){
            if(isset($request['delete'])){
                $program->predmeti()->where('studijsko_leto' ,'=', $sl)->detach($predmet->id);
            }else{
                $program->predmeti()->attach($predmet->id, ['studijsko_leto'=>$sl, 'letnik'=>$request['letnik'], 'tip'=>$request['tip'], 'id_modula'=>$id_modula, 'semester'=>$request['semester']]);
            }
        }else{
            if(isset($request['delete'])){
                $program->predmeti()->where('studijsko_leto' ,'=', $sl)->detach($predmet->id);
            }else {
                $program->predmeti()->updateExistingPivot($existingPredmet->id, ['studijsko_leto' => $sl, 'letnik' => $request['letnik'], 'id_modula' => $id_modula, 'tip' => $request['tip'], 'semester' => $request['semester']]);
            }
        }

        return Redirect::back()->with('odgovor', 'Predmetnik posodobljen.');
    }

}
