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
use App\Helpers\ExportHelper;

class KartotecniListController extends Controller
{
    public function index()
	{
		//
	}

    public function prikazKartotecniList($stud=null)
    {

        if (is_null($stud))
        {
            $student = Student::where ('email', '=', (\Session::get('session_id')))->first();
        }
        else
        {
            $student = Student::find($stud);
        }


        $vloga = (\Session::get('vloga'));

        if (is_null($student))
        {

            return redirect()->action('WelcomeController@index');
        }
        else
        {

            $programiStudenta = $student->studentProgram()->whereNotNull('vloga_potrjena')->get();
            $programiStudenta = $programiStudenta->sortBy('vloga_potrjena');
            $predmeti = StudentPredmet::where('id_studenta','=',$student->id);
            return view('kartotecniList', ['student'=>$student, 'programi'=>$programiStudenta, 'predmeti'=>$predmeti]);
        }

    }

    public function export(Request $request)
    {
        //tu ne sme biti iz seje
        $student = Student::where ('email', '=', (\Session::get('session_id')))->first();
        $programiStudenta = $student->studentProgram()->whereNotNull('vloga_potrjena')->get();
        $programiStudenta = $programiStudenta->sortBy('vloga_potrjena');
        $predmeti = StudentPredmet::where('id_studenta','=',$student->id);

        if(isset($request['pdf'])) {
            $pdf = \App::make('dompdf');
            ini_set('max_execution_time', 300);
            if ($request['vsa_polaganja'] == 0)
            {
                $pdf->loadHTML(\View::make('pdf/kartotecniList_pdf')->with('student', $student)->with('programi', $programiStudenta)->with('predmeti', $predmeti));

            }
            else
            {
                $pdf->loadHTML(\View::make('pdf/kartotecniList_pdf2')->with('student', $student)->with('programi', $programiStudenta)->with('predmeti', $predmeti));

            }
            return $pdf->download('kartotecniList.pdf');
        }
        return Redirect::back();

    }


}