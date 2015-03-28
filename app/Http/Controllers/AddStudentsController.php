<?php namespace App\Http\Controllers;

class AddStudentsController extends Controller {

	public function __construct(){
        $this->middleware('guest');
	}

	public function addFromText(){

        $file = \Input::file('file');

        $counter = 0;
        $name = "";
        $surname = "";
        $program = "";
        $email = "";
        $error = 0;

        \DB::beginTransaction();

        foreach(file($file) as $line) {

            $words = preg_split('/\s+/', $line, -1, PREG_SPLIT_NO_EMPTY);

            if (count($words) > 0) {

                if (($counter == 0) && ($words[0] == 'IME')) {
                    $name = $words[1];
                    if (strlen($name) > 30) {
                        $error = 1;
                    }
                    $counter++;
                } else if (($counter == 1) && ($words[0] == 'PRIIMEK')) {
                    $surname = $words[1];
                    if (strlen($surname) > 30) {
                        $error = 1;
                    }
                    $counter++;
                } else if (($counter == 2) && ($words[0] == 'PROGRAM')) {
                    $program = $words[1];
                    if (strlen($program) > 7) {
                        $error = 1;
                    }
                    $counter++;
                } else if (($counter == 3) && ($words[0] == 'E_MAIL')) {
                    $email = $words[1];
                    if (strlen($email) > 30) {
                        $error = 1;
                    }
                    $counter++;
                }

                if ($counter == 4) {

                    if ($error == 0) {

                        $id = \App\Models\Student::all()->count();

                        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
                        $pass = array(); //remember to declare $pass as an array
                        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                        for ($i = 0; $i < 8; $i++) {
                            $n = rand(0, $alphaLength);
                            $pass[] = $alphabet[$n];
                        }
                        $password = implode($pass);

                        $student = new \App\Models\Student;
                        $student -> id = $id;
                        $student -> vpisna = 0;
                        $student -> ime = $name;
                        $student -> priimek = $surname;
                        $student -> email = $email;
                        $student -> studijski_program = 1;
                        $student -> geslo = $password;
                        $student -> emso = 9;
                        $student -> posta = 5000;
                        $student -> datum_rojstva = '1-1-2101';
                        $student -> obcina_rojstva = 'bla';

                        $student -> save();
                    }

                    $counter = 0;
                    $name = '';
                    $surname = '';
                    $email = '';
                    $program = '';
                }
            }
        }

        if($error == 1) {
            \Session::flash("debug", "Prišlo je do napake pri shranjevanju v bazo, razlog: polja vsebujejo preveč znakov");
            \DB::rollback();
        }
        else{
            \DB::commit();
        }

        return redirect()->back();
	}
}
