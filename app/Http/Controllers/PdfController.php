<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\ExcelHelper;
use App\Models\Predmet;

use Illuminate\Http\Request;

class PdfController extends Controller {

    public function export_pdf(){

        $predmeti = Predmet::all();
        $pdf = \App::make('dompdf');
        $pdf->loadView('pdf/predmeti', ['predmeti'=>$predmeti]);
        return $pdf->download('predmeti.pdf');
    }
}