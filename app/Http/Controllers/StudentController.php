<?php namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\StudentPredmet;
use App\Models\StudentProgram;
use App\Models\StudijskiProgram;
use App\Models\VrstaVpisa;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Nosilec;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

    public function searchForm()
    {

        return view('student/iskanjeStudenta',['vnosOcene'=>0]);
    }

    public function search(Request $request){
        $search = $request['iskalnik_studentov'];
        $studenti = Student::where('vpisna', 'LIKE', '%'.$search.'%')->orWhere('ime', 'LIKE', $search.'%')->orWhere('priimek', 'LIKE', $search.'%')->get();
        $return = [];
        if($request['return_type']=='json'){
            return response($studenti->toJson,200,['Content-Type'=>'application/json']);
        }
        return view('student/iskanjeStudenta', ['studenti'=>$studenti, 'vnosOcene'=>0]);

    }

    public function novZeton($id){
        $student = Student::find($id);
        $vrsteVpisa = VrstaVpisa::all();
        $programi = StudijskiProgram::all();
        return view('/referent/novVpisniList',['student'=>$student ,'vrste_vpisa'=>$vrsteVpisa, 'studentNajden'=>1, 'empty' => 1, 'programStudenta'=>null,
            'programi'=>$programi, 'datum_prvega_vpisa' => '']);
    }

    public function ustvariNovZeton($id, Request $r)
    {
        $student = Student::find($id);
        if(!is_null($student))
        {
            $programStudent = new StudentProgram();
            $programStudent->id_studenta = $student->id;
            $studijskiProgram = StudijskiProgram::find($r['studijski_program']);
            if(!is_null($studijskiProgram)){
                $programStudent->id_programa = $studijskiProgram->id;
            }else{
                return Redirect::back()->withErrors('Študijski program ne obstaja!');
            }
            if((int)$r['letnik'] > 0 && (int)$r['letnik']<= $studijskiProgram->trajanje_leta){
                $programStudent->letnik = (int)$r['letnik'];
            }else{
                return Redirect::back()->withErrors('Letnik se ne ujemas programom!');
            }
            $programStudent->nacin_studija = $r['nacin_studija'];
            $programStudent->vrsta_vpisa = (int)$r['vrsta_vpisa'];
            $studijsko_leto = DateHelper::studijskoLeto($r['studijsko_leto']);
            if(!empty($studijsko_leto)) {
                $programStudent->studijsko_leto = $r['studijsko_leto'];
            }else{
                return Redirect::back()->withErrors('Študijsko leto je v napačnem formatu!');
            }
            if($r['prosta_izbira']){
                $programStudent->prosta_izbira = 1;
            }else{
                $programStudent->prosta_izbira = 0;
            }
            $programStudent->save();

            return Redirect( action('StudentController@show', ['id'=>$student->id]));
        }
        return Redirect::back()->withErrors('Študent ne obstaja');
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
		$student = Student::find($id);
        $studentProgrami= $student->studentProgram;
        $vrsteVpisa = VrstaVpisa::all();
        $predmeti = null;
        $ucitelj = null;

        if (\Session::get('vloga') == "ucitelj" )
        {
            $ucitelj = Nosilec::where('email','=',\Session::get('session_id'))->first();
            $studentPredmeti = StudentPredmet::with('predmet')->where('id_studenta','=',$student->id)->get();

            $predmeti = $studentPredmeti->filter(function($sp) use ($ucitelj)
            {
                return $sp->predmet->id_nosilca == $ucitelj->id;

            })->values();

        }
        return view('student/studentInfo', ['student'=>$student, 'studentProgrami'=>$studentProgrami, 'vrsteVpisa'=>$vrsteVpisa, 'predmeti'=>$predmeti,'ucitelj'=>$ucitelj]);
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

    public function elektronskiIndeks($id)
    {
        $student = Student::find($id);
        if(!is_null($student)){
            $predmeti = $student->trenutniPredmeti();
            $program = $student->trenutniProgram();
            if(!is_null($program)){
                $vrsta_vpisa = VrstaVpisa::find($program->pivot->vrsta_vpisa);
            }else{
                $vrsta_vpisa = null;
            }

            return view('/student/elektronskiIndeks', ['student'=>$student]);
        }
        return \Redirect::back();

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
