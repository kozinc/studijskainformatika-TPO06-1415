<?php namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\StudentProgram;
use App\Models\StudijskiProgram;
use App\Models\VrstaVpisa;
use Illuminate\Http\Request;
use App\Models\Student;
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
            return view('/');
        }
        return view('kartotecniList');
    }
}