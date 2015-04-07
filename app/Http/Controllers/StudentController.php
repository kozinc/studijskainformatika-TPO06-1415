<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\VrstaVpisa;
use Illuminate\Http\Request;
use App\Models\Student;
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

    public function searchForm(){
        return view('student/iskanjeStudenta');
    }

    public function search(Request $request){
        $search = $request['iskalnik_studentov'];
        $studenti = Student::where('vpisna', 'LIKE', '%'.$search.'%')->orWhere('ime', 'LIKE', $search.'%')->orWhere('priimek', 'LIKE', $search.'%')->get();
        $return = [];
        if($request['return_type']=='json'){
            return response($studenti->toJson,200,['Content-Type'=>'application/json']);
        }
        return view('student/iskanjeStudenta', ['studenti'=>$studenti]);

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
        return view('student/studentInfo', ['student'=>$student]);
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

    public function predmetnik($id)
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

            return view('studentPredmetnik', ['student'=>$student, 'predmeti'=>$predmeti, 'program'=>$program, 'vrsta_vpisa'=>$vrsta_vpisa]);
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
