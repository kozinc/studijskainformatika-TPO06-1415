<?php namespace App\Http\Controllers;

use App\Student;

class HomeController extends Controller {

    public function __construct(){
        $this->middleware('guest');
    }

    public function datoteka(){
        return view('addnew');
    }

}
