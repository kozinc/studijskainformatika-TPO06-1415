<?php namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\IzpitniRok;
use App\Models\StudentProgram;
use App\Models\StudijskiProgram;
use App\Models\VrstaVpisa;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Nosilec;
use App\Models\Predmet;
use App\Models\StudentPredmet;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\ExportHelper;


class VnosOceneReferentController extends Controller
{
    public function index()
    {
        //
    }

    public function vnesiOceno($id_studenta)
    {
        $student = Student::find($id_studenta);
        return view('vnosOceneReferent', ['student'=>$student]);
    }

    public function obdelajObrazecOcena()
    {
        return Redirect(action('StudentController@searchForm'));
    }
}