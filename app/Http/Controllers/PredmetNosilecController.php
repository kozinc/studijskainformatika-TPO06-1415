<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Modul;
use App\Models\Nosilec;
use App\Models\Predmet;
use Illuminate\Support\Facades\Redirect;

use App\Models\PredmetNosilec;
use Illuminate\Http\Request;


class PredmetNosilecController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($idp)
	{
		//
        //$trojka = new PredmetNosilec();

        $nosilci = Nosilec::all();
        $predmeti = Predmet::all();

        return view('trojka/trojkaCreate',['idp'=>$idp, 'nosilci'=>$nosilci, 'predmeti'=>$predmeti]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($idp, Request $request)
	{
		//
        $trojka = new PredmetNosilec();
        $trojka->id_predmeta = $request['id_predmeta'];


        $trojka->studijsko_leto = $request['studijsko_leto'];

        $trojka->id_nosilca = (int)$request['id_nosilca'];
        $trojka->id_nosilca2 = (int)$request['id_nosilca2'];
        $trojka->id_nosilca3 = (int)$request['id_nosilca3'];

        if( $trojka->id_nosilca == $trojka->id_nosilca2 ) {
            $trojka->id_nosilca2 = 0;
        }
        if( $trojka->id_nosilca == $trojka->id_nosilca3 ) {
            $trojka->id_nosilca3 = 0;
        }
        if( $trojka->id_nosilca2 == $trojka->id_nosilca3 ) {
            $trojka->id_nosilca3 = 0;
        }

        if( $trojka->id_nosilca2 == 0 && $trojka->id_nosilca3 != 0 ) {
            $trojka->id_nosilca2 = $trojka->id_nosilca3;
            $trojka->id_nosilca3 = 0;
        }

        $trojka->save();

        return redirect('predmeti/'.$trojka->id_predmeta.'/edit');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
        $trojka = PredmetNosilec::find($id);
        $nosilci = Nosilec::all();
        $predmeti = Predmet::all();

        return view('trojka/trojkaEdit',['trojka'=>$trojka, 'nosilci'=>$nosilci, 'predmeti'=>$predmeti]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//
        $trojka = PredmetNosilec::find((int)$id);
        $input = $request->all();
        $trojka->studijsko_leto = $request['studijsko_leto'];

        $trojka->id_nosilca = (int)$request['id_nosilca'];
        $trojka->id_nosilca2 = (int)$request['id_nosilca2'];
        $trojka->id_nosilca3 = (int)$request['id_nosilca3'];

        if( $trojka->id_nosilca == $trojka->id_nosilca2 ) {
            $trojka->id_nosilca2 = 0;
        }
        if( $trojka->id_nosilca == $trojka->id_nosilca3 ) {
            $trojka->id_nosilca3 = 0;
        }
        if( $trojka->id_nosilca2 == $trojka->id_nosilca3 ) {
            $trojka->id_nosilca3 = 0;
        }

        if( $trojka->id_nosilca2 == 0 && $trojka->id_nosilca3 != 0 ) {
            $trojka->id_nosilca2 = $trojka->id_nosilca3;
            $trojka->id_nosilca3 = 0;
        }


        /*shrani spremembe*/
        $check = $trojka->save();
        $check2= $trojka->push();
        return redirect('predmeti/'.$trojka->id_predmeta.'/edit');
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

    public function delete($id)
	{
		//

        $trojka = PredmetNosilec::find((int)$id);
        $idp = $trojka->id_predmeta;
        $studleto = $trojka->studijsko_leto ;
        /*$nosilec1 = Nosilec::find($trojka->id_nosilca);
        $nosilec2 = Nosilec::find($trojka->id_nosilca2);
        $nosilec3 = Nosilec::find($trojka->id_nosilca3);*/

        // \DB::table('predmet_nosilec')->where('id', $id)->delete();
        \App\Models\PredmetNosilec::where('id', $id)->delete();
        \Session::set("trojka_sporocilo", "Trojka ".$studleto." [".$id."]  je bila izbrisana");
        return redirect('predmeti/'.$idp.'/edit');
	}

}
