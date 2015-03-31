<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Modul;
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
		$nosilci = Nosilec::all();
        $moduli = Modul::all();
        return view('predmetCreate', ['nosilci'=>$nosilci, 'moduli'=>$moduli]);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$predmet = new Predmet();
        $predmet->id_nosilca = (int)$request['id_nosilca'];
        $predmet->tip = $request['tip'];
        $predmet->KT = (int)$request['KT'];
        $predmet->naziv = $request['naziv'];
        if($predmet->tip == 'modulski'){
            $predmet->id_modula = (int)$request['id_modula'];
        }else{
            $predmet->id_modula = NULL;
        }
        $check = $predmet->save();

        $nosilci = Nosilec::all();
        $moduli = Modul::all();
        if($predmet->id > 0){
           // return view('predmetEdit/'.$predmet->id, ['predmet'=>$predmet, 'nosilci'=>$nosilci, 'moduli'=>$moduli, 'odgovor'=>'Predmet uspešno ustvarjen!']);
            return redirect('predmeti/'.$predmet->id);
        }else{
            return view('predmetCreate', ['nosilci'=>$nosilci, 'moduli'=>$moduli]);
        }
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
        $moduli = Modul::all();
		return view('predmetEdit',['predmet'=>$predmet, 'nosilci'=>$nosilci, 'moduli'=>$moduli]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$predmet = Predmet::find((int)$id);
        $predmet->naziv = $request['naziv'];
        $predmet->opis = $request['opis'];
        $predmet->KT = (int)$request['kt'];
        $predmet->id_nosilca = (int)$request['id_nosilca'];
        $predmet->tip = $request['tip'];
        if($predmet->tip == 'modulski'){
            $predmet->id_modula = (int)$request['id_modula'];
        }else{
            $predmet->id_modula = NULL;
        }
        $check = $predmet->save();

        $nosilci = Nosilec::all();
        return view('predmetEdit', ['predmet'=>$predmet,'nosilci'=>$nosilci, 'status'=>'success', 'odgovor'=>'Predmet uspešno posodobljen!']);


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
