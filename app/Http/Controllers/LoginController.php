<?php namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller {

    public function __construct() {
        $this->middleware('guest');
    }

    public function add_to_session(){
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

        $password_reset = \Input::get('password-reset');
        if(isset($password_reset)){
            return $this->passwordReset();
        }
        $request = \Request::instance();
        $request->setTrustedProxies(array('127.0.0.1'));
        $ip_address = $request->getClientIp();

        $locked_ip = \App\Models\ZakIp::where('ip', $ip_address) -> first();

        if($locked_ip != null){
            $get_date = $locked_ip -> datum_odklenitve;
            $get_date = strtotime($get_date);
            if($get_date > time()){
                \Session::flash("error", "Zaklenjen IP");
                return redirect()->back();
            }
            else {
                $locked_ip->delete();
            }
        }

        if(\Session::get('st_prijav') > 3){
            date_default_timezone_set('Europe/Ljubljana');
            $date = strtotime("+1 days");
            $date = date('Y:m:d H:i:s', $date);

            $lock_ip = new \App\Models\ZakIp;
            $lock_ip -> ip = $ip_address;
            $lock_ip -> datum_odklenitve = $date;
            $lock_ip -> save();
            \Session::set('st_prijav', 0);
            \Session::flash("error", "Zaradi prevelikega števila napačnih prijav, bo vaš IP zaklenjen 24h");
            return redirect()->back();
        }

        $this_username = \Input::get('username');
        $this_password = \Input::get('password');

        if(strlen($this_username) < 1 || strlen($this_password) < 1){
            \Session::flash("error", "Manjkajoče uporabniško ime ali geslo!");
            $this->add_to_session();
            return redirect()->back();
        }

        $user = \App\Models\Student::where('email', $this_username)->first();

        if(is_null($user)){
            \Session::flash("error", "Uporabnik s takšnim e-mailom ne obstaja!");
            $this->add_to_session();
            return redirect()->back();
        }
        if(!\Hash::check($this_password, $user->geslo)){
            \Session::flash("error", "Geslo se ne ujema z uporabniškim imenom!");
            $this->add_to_session();
            return redirect()->back();
        }

        \Session::set("session_id", $this_username);
        return view('home');

    }

    public function passwordReset(){
        $mail = \Input::get('username');
        $student = Student::where('vpisna', '=', $mail)->first();

        if(!is_null($student)){
            $student->passwordReset();
        }
        return redirect()->back()->with(['msg'=>'Novo geslo je bilo poslano na vaš email.']);
    }

    public function passwordResetPotrditev($koda){

        $pos = strpos($koda, '-');
        $id = substr($koda, 0, $pos);
        $student = Student::find((int)$id);

        if(!is_null($student)){
            $potrditev = substr($koda, $pos+1);
            $status = $student->passwordResetPotrditev($potrditev);
            if($status){
                $msg = 'Geslo ponastavljeno!';
            }else{
                $msg = 'Napaka pri ponastavljanju gesla';
            }
            return redirect('/')->with(['msg'=>$msg]);
        }
        return false;
    }

}