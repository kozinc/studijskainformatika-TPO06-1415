<?php namespace App\Http\Controllers;

class LoginController extends Controller {

    public function __construct() {
        $this->middleware('guest');
    }

    public  function add_to_session(){
        if (\Session::has('st_prijav')){
            $st = \Session::get('st_prijav');
            $st++;
            \Session::set('st_prijav', $st);
        }
        else {
            \Session::set('st_prijav', 0);
        }
    }

    public function login_handler(){

        //IP preko 'trusted' naslova (localhost)
        //Se zaenkrat nikamor ne hrani, napacne prijave se stejejo v seji
        $request = \Request::instance();
        $request->setTrustedProxies(array('127.0.0.1'));
        $ip_address = $request->getClientIp();

        if(\Session::get('st_prijav') >= 3){
            \Session::flash("error", "Tvoj IP bo zaradi prevelikega števila napačnih prijav nekoč zaklenjen!");

        }

        //obdelava (ne) vnesenih podatkov
        $this_username = \Input::get('username');
        $this_password = \Input::get('password');

        if(strlen($this_username) < 1 || strlen($this_password) < 1){
            \Session::flash("error", "Manjkajoče uporabniško ime ali geslo!");
            self::add_to_session();
            return redirect()->back();
        }

       // $user = \DB::table('student')->where('vpisna', $this_username)->first();

        $user = \App\Models\Student::where('vpisna', $this_username)->first();


        if(is_null($user)){
            \Session::flash("error", "Uporabnik s takšno vpisno številko ne obstaja!");
            self::add_to_session();
            return redirect()->back();
        }
        if($this_password != ($user->geslo)){
            \Session::flash("error", "Geslo se ne ujema z vpisno številko!");
            self::add_to_session();
            return redirect()->back();
        }

        return view('home');

    }
}