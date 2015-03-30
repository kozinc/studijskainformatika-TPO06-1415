<?php namespace App\Http\Controllers;

class LoginController extends Controller {

    public function __construct() {
        $this->middleware('guest');
    }

    public function get_all_students(){

        /*$predmeti = \App\Models\Predmet::lists('naziv', 'id');
        return View::make('addnew')->with('predmeti', $predmeti);*/

    }

}