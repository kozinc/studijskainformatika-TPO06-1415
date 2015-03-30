<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Nosilec;
use App\Models\Predmet;

use Illuminate\Http\Request;

class PredmetController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $predmeti = Predmet::all();
        return view('predmeti',['predmeti'=>$predmeti]);

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
		$predmet = Predmet::find($id);
        return view('predmet',['predmet'=>$predmet]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $predmet = Predmet::find($id);
        $nosilci = Nosilec::all();
		return view('predmet_edit',['predmet'=>$predmet, 'nosilci'=>$nosilci]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$predmet = Predmet::find($id);
        $predmet->naziv = $request['naziv'];
        $predmet->opis = $request['opis'];
        $predmet->kt = $request['kt'];
        $predmet->id_nosilca = $request['id_nosilca'];
        $predmet->tip = $request['tip'];
        if($predmet->tip == 'modulski'){
            $predmet->id_modula = $request['id_modula'];
        }else{
            $predmet->id_modula = NULL;
        }
        $predmet->save();
        $nosilci = Nosilec::all();
        return view('predmeti_edit', ['predmet'=>$predmet,'nosilci'=>$nosilci, 'status'=>'success', 'odgovor'=>'Predmet uspešno posodobljen!']);


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

}
