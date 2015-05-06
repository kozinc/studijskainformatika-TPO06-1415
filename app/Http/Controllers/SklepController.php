<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Sklep;
use App\Models\Organ;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SklepController extends Controller {

    public function edit($idStudenta, $idSklepa)
    {
        $student = Student::find($idStudenta);
        $sklep = Sklep::find($idSklepa);
        $organi = Organ::all();
        return view('sklep/sklep',['student'=>$student, 'sklep'=>$sklep, 'organi'=>$organi]);
    }

    public function update($idStudenta, $idSklepa, Request $request)
    {
        $sklep = Sklep::find($idSklepa);
        $student = Student::find($idStudenta);
        $organi = Organ::all();
        if(!is_null($sklep)){
            if(isset($request['delete'])){
                Sklep::destroy($idSklepa);
                return redirect('studenti/'.$idStudenta)->with('odgovor','Sklep izbirsan.');
            }else{
                $sklep->datum_izdaje = date('Y-m-d',strtotime($request['datum_izdaje']));
                $sklep->datum_veljavnosti = date('Y-m-d',strtotime($request['datum_veljavnosti']));
                $sklep->id_organa = $request['organ'];
                if($sklep->id_organa == 0){
                    return Redirect::back()->withErrors('Neveljaven organ fakultete.');
                }
                $sklep->vsebina = $request['vsebina'];
                $sklep->save();
                return Redirect::back()->with('odgovor','Sklep uspešno shranjen.');
                //return view('sklep/sklep',['student'=>$student, 'sklep'=>$sklep])->with('odgovor','Sklep uspešno shranjen!');
            }
        }

        return view('sklep/sklep',['student'=>$student, 'sklep'=>$sklep, 'organi'=>$organi])->withErrors('Napaka pri shranjevanju!');
    }

    public function create($idStudenta)
    {
        $student = Student::find($idStudenta);
        $organi = Organ::all();
        return view('sklep/sklep', ['student'=>$student, 'organi'=>$organi]);
    }

    public function store($idStudenta, Request $request)
    {
        $student = Student::find($idStudenta);
        $sklep = new Sklep;
        $sklep->datum_izdaje = date('Y-m-d',strtotime($request['datum_izdaje']));
        $sklep->datum_veljavnosti = date('Y-m-d',strtotime($request['datum_veljavnosti']));
        $sklep->vsebina = $request['vsebina'];
        $sklep->id_studenta = $student->id;
        $sklep->id_organa = $request['organ'];
        if($sklep->id_organa == 0){
            return Redirect::back()->withErrors('Neveljaven organ fakultete.');
        }
        $sklep->save();
        return redirect('studenti/'.$student->id)->with('odgovor','Sklep ustvarjen.');
    }

}