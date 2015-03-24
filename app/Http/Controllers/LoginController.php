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

        //IP preko 'trusted' naslova (localhost)
        //Se zaenkrat nikamor ne hrani, napacne prijave se stejejo v seji
        $request = \Request::instance();
        $request->setTrustedProxies(array('127.0.0.1'));
        $ip_address = $request->getClientIp();

        if (\Session::has('st_prijav')){
            $st = \Session::get('st_prijav');
            $st++;
            \Session::set('st_prijav', $st);
        }
        else {
            \Session::set('st_prijav', 0);
        }

        if(\Session::get('st_prijav') >= 3){
            \Session::flash("error", "Tvoj IP bo zaradi prevelikega števila napačnih prijav nekoč zaklenjen!");
            return redirect()->back();
        }

        //obdelava (ne) vnesenih podatkov
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