<?php namespace App\Http\Controllers;

class LoginController extends Controller {

    public function __construct() {
        $this->middleware('guest');
    }

    public function get_all_students(){
        $users = App/Models/Student::all();
        foreach ($users as $user){
            echo $user->ime;
        }
    }

}