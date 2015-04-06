<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Modul;
use App\Models\Nosilec;
use App\Models\Predmet;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\ExportHelper;

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
        return view('predmet/predmeti',['predmeti'=>$predmeti]);

	}

    public function export(Request $request){
        $content = [];
        $title = '';
        if($request['target'] == 'predmeti') {
            $predmeti = Predmet::all();
            $content[] = ['Id', 'Naziv', 'Tip', 'Nosilec'];
            foreach ($predmeti as $predmet) {
                $content[] = [$predmet->id, $predmet->naziv, $predmet->tip, $predmet->nosilec->ime .' '. $predmet->nosilec->priimek];
            }
            $title = 'Seznam predmetov';

        }elseif($request['target'] == 'predmet' && $request['id']>0) {
            $predmet = Predmet::find((int)$request['id']);
            $modul = '';
            if(!empty($predmet->modul)){
                $modul = $predmet->modul->ime;
            }
            $content[] = ['id', 'naziv', 'id_nosilca', 'KT', 'tip','id_modula'];
            $content[] = [$predmet->id, $predmet->naziv, $predmet->nosilec->ime .' '.$predmet->nosilec->priimek, $predmet->KT, $predmet->tip, $modul];
            $title = $predmet->naziv;
        }


        if(isset($request['csv'])){
            return ExportHelper::make_csv($content, $title, '');
        }elseif(isset($request['pdf'])){
            return ExportHelper::make_pdf($content, $title, '');
        }

        return Redirect::back();
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
        return view('predmet/predmetCreate', ['nosilci'=>$nosilci, 'moduli'=>$moduli]);

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
        $predmet->save();

        $nosilci = Nosilec::all();
        $moduli = Modul::all();
        if($predmet->id > 0){
           // return view('predmetEdit/'.$predmet->id, ['predmet'=>$predmet, 'nosilci'=>$nosilci, 'moduli'=>$moduli, 'odgovor'=>'Predmet uspešno ustvarjen!']);
            return redirect('predmeti/'.$predmet->id);
        }else{
            return view('predmet/predmetCreate', ['nosilci'=>$nosilci, 'moduli'=>$moduli]);
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

        return view('predmet/predmet',['predmet'=>$predmet]);
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
		return view('predmet/predmetEdit',['predmet'=>$predmet, 'nosilci'=>$nosilci, 'moduli'=>$moduli]);
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

        return redirect('predmeti/'.$predmet->id);


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
