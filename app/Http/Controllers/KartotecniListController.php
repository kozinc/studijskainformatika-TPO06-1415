<?php namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\StudentProgram;
use App\Models\StudijskiProgram;
use App\Models\VrstaVpisa;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentPredmet;
use Illuminate\Support\Facades\Redirect;

class KartotecniListController extends Controller
{
    public function index()
	{
		//
	}

    public function prikazKartotecniList()
    {
        $student = Student::where ('email', '=', (\Session::get('session_id')))->first();
        $vloga = (\Session::get('vloga'));
        if (is_null($student) || $vloga != "student")
        {
            return redirect()->action('WelcomeController@index');
        }
        else
        {

            $programiStudenta = $student->studentProgram()->whereNotNull('vloga_potrjena');
            $predmeti = StudentPredmet::where('id_studenta','=',$student->id);
            return view('kartotecniList', ['programi'=>$programiStudenta, 'predmeti'=>$predmeti]);
        }

    }


}