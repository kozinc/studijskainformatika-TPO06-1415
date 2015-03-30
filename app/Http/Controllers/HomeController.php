<?php namespace App\Http\Controllers;

use App\Models\Student;

class HomeController extends Controller {

    public function __construct(){
        $this->middleware('guest');
    }

    public function datoteka(){
        return view('addnew');
    }

    public function seznam(){

        $predmeti = \App\Models\Predmet::lists('naziv', 'id');
        //return View::make('seznam')->with('predmeti', $predmeti);

    }

}
