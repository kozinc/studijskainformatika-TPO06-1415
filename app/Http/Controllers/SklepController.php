<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Sklep;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SklepController extends Controller {

    public function edit($idStudenta, $idSklepa)
    {
        $student = Student::find($idStudenta);
        $sklep = Sklep::find($idSklepa);
        return view('sklep/sklep',['student'=>$student, 'sklep'=>$sklep]);
    }

    public function update($idStudenta, $idSklepa, Request $request)
    {
        $sklep = Sklep::find($idSklepa);
        $student = Student::find($idStudenta);
        if(!is_null($sklep)){
            if(isset($request['delete'])){
                Sklep::destroy($idSklepa);
                return redirect()->action('StudentController@show',['id'=>$idStudenta]);
            }else{
                $sklep->datum = date('Y-m-d',strtotime($request['datum']));
                $sklep->vsebina = $request['vsebina'];
                $sklep->save();
                return view('sklep/sklep',['student'=>$student, 'sklep'=>$sklep])->with('odgovor','Sklep uspešno shranjen!');
            }
        }

        return view('sklep/sklep',['student'=>$student, 'sklep'=>$sklep])->withErrors('Napaka pri shranjevanju!');
    }

    public function create($idStudenta)
    {
        $student = Student::find($idStudenta);
        return view('sklep/sklep', ['student'=>$student]);
    }

    public function store($idStudenta, Request $request)
    {
        $student = Student::find($idStudenta);
        $sklep = new Sklep;
        $sklep->datum = date('Y-m-d',strtotime($request['datum']));
        $sklep->vsebina = $request['vsebina'];
        $sklep->id_studenta = $student->id;
        $sklep->save();
        return redirect()->action('SklepController@edit',['idStudenta'=>$student->id,'idSklepa'=>$sklep->id]);
    }

    public function delete($idStudenta, $idSklepa)
    {
        $sklep = Sklep::destroy($idSklepa);
        return redirect()->action('StudentController@show',['id'=>$idStudenta]);
    }
}