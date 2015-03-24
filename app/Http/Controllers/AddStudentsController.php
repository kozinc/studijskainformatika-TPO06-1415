<?php namespace App\Http\Controllers;

class AddStudentsController extends Controller {

	public function __construct(){
        $this->middleware('guest');
	}

	public function addFromText(){

        //tle je treba te programe nekako postimat
        //treba je dodat, da bo automatsko naprej id delalo

        // ne razumem tocno a je treba nujno 30 znakov imet

        $file = \Input::file('file');

        $counter = 0;
        $name = "";
        $surname = "";
        $program = "";
        $email = "";
        foreach(file($file) as $line){
            switch($counter) {
                case 0:
                    $name = $line;
                    break;
                case 1:
                    $surname = $line;
                    break;
                case 2:
                    $program = $line;
                    break;
                case 3:
                    $email = $line;
                    break;
            }
            $counter++;
        }

        //generira random geslo
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $password = implode($pass);

        //doda studenta v bazo
        \DB::insert('insert into student (id, vpisna, ime, priimek, email, studijski_program, geslo, emso, posta, datum_rojstva, obcina_rojstva) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [4, 33, $name, $surname, $email, 1, $password, "ee", 1, "12-1-1001", "djd"]);

        return redirect()->back();
	}

}
