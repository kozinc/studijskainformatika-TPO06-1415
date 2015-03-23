<?php namespace App\Http\Controllers;

class LoginController extends Controller {

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
    public function login_handler(){

        $this_username = \Input::get('username');
        $this_password = \Input::get('password');

        if(strlen($this_username) < 1 || strlen($this_password) < 1){
            \Session::flash("error", "Manjkajoče uporabniško ime ali geslo!");
            return redirect()->back();
        }

        $user = \DB::table('student')->where('vpisna', $this_username)->first();

        if(is_null($user)){
            \Session::flash("error", "Uporabnik s takšno vpisno številko ne obstaja!");
            return redirect()->back();
        }
        if($this_password != ($user->geslo)){
            \Session::flash("error", "Geslo se ne ujema z vpisno številko!");
            return redirect()->back();
        }
        echo "Have a good day!";

    }
}