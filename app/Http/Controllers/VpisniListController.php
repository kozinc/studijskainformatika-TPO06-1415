<?php namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudijskiProgram;
use App\Models\StudentProgram;


class VpisniListController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function obrazecVpisniList(){

        $student = Student::where ('email', '=', 'nezabelej@gmail.com')->first();
        $programStudenta = $student->studentProgram()->where('vloga_oddana', '=', null)->first();
        $program = StudijskiProgram::find($programStudenta->id_programa);
        $prviVpis = $programStudenta->where('id_programa','=',$program->id)->first();
        $predmetiObvezni = $program->predmeti()->where('tip','=','obvezni')->where('letnik','=',$programStudenta->letnik);


        return view('vpisnilist',['student'=>$student , 'programStudenta'=>$programStudenta,
                    'program'=>$program, 'datum_prvega_vpisa' => $prviVpis->datum_vpisa, 'predmetiObvezni' => $predmetiObvezni]);

    }
}