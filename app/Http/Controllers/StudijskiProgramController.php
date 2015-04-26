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
	public function update($id)
	{
		//
	}

    public function spremeni_strukturo($id, Request $request)
    {
        $program = StudijskiProgram::find($id);
        $letniki = $program->letniki;
        foreach($letniki as $letnik)
        {
            $letnik->KT = $request['KT_'.$letnik->letnik];
            $letnik->stevilo_obveznih_predmetov = $request['obvezni_predmeti_'.$letnik->letnik];
            $letnik->stevilo_strokovnih_predmetov = $request['strokovni_predmeti_'.$letnik->letnik];
            $letnik->stevilo_prostih_predmetov = $request['prosti_predmeti_'.$letnik->letnik];
            $letnik->stevilo_modulov = $request['moduli_'.$letnik->letnik];
            $letnik->save();
        }
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
        $stud_leto = $leto.'/'.date('Y',strtotime($leto));
        $program = StudijskiProgram::find((int)$id);
        $predmeti = Predmet::all();
        return view('program/programPredmetnik',['program'=>$program, 'predmeti'=>$predmeti, 'studijsko_leto'=>$stud_leto] );
    }

    public function editPredmetnik($id, Request $request){
        $program = StudijskiProgram::find((int)$id);
        $predmeti = $program->studijska_leta;
        $moduli = Modul::all();


        return view('program/programPredmetnikEdit', ['program'=>$program, 'predmeti'=>$predmeti, 'moduli'=>$moduli]);
    }

}
