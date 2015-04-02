<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        return view('program/program', ['program'=>$program]);
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

    public function show_predmetnik($id){
        $program = StudijskiProgram::find((int)$id);
        return view('program/programPredmetnik',['program'=>$program] );
    }

    public function edit_predmetnik($id){
        $program = StudijskiProgram::find((int)$id);
        $predmeti = Predmet::all();
        $moduli = Modul::all();
        return view('program/programPredmetnikEdit', ['program'=>$program, 'predmeti'=>$predmeti, 'moduli'=>$moduli]);
    }

}
