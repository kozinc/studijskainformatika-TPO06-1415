<?php namespace App\Http\Controllers;

class AddStudentsController extends Controller {

	public function __construct(){
        $this->middleware('guest');
	}

	public function addFromText(){

        $file = \Input::file('file');

        $counter= 0;
        $name = "";
        $surname = "";
        $program = "";
        $email = "";
        $error = 0;

        \DB::beginTransaction();

        foreach(file($file) as $line) {

            $words = preg_split('/\s+/', $line, -1, PREG_SPLIT_NO_EMPTY);

            if (count($words) > 0) {

                if(count($words) < 4){
                    $counter = 1;
                }
                else{

                    $name = $words[0];
                    if (strlen($name) > 30) {
                        $error = 1;
                    }

                    $surname = $words[1];
                    if (strlen($surname) > 30) {
                        $error = 1;
                    }

                    $program = $words[2];
                    if (strlen($program) > 7) {
                        $error = 1;
                    }

                    $email = $words[3];
                    if (strlen($email) > 60) {
                        $error = 1;
                    }

                    if ($error == 0) {


                        $password = str_random(8);

                        $student = new \App\Models\Student;
                        $student -> ime = $name;
                        $student -> priimek = $surname;
                        $student -> email = $email;
                        $student -> geslo = \Hash::make($password);
                        $student -> save();

                        $id = $student -> id;
                        $predmet_id = 0;

                        if($program == 'BUN-RI'){
                            $predmet_id = 1;
                        }
                        else if($program == 'BVS-RI'){
                            $predmet_id = 2;
                        }
                        else if($program == 'BMAG-RI'){
                            $predmet_id = 3;
                        }

                        $student_program = new \App\Models\StudentProgram;
                        $student_program -> id_studenta = $id;
                        $student_program -> id_programa = $predmet_id;
                        $student_program -> vrsta_vpisa = 1;

                        $student_program -> save();
                    }
                }

                $name = '';
                $surname = '';
                $email = '';
                $program = '';
            }
        }

        if($error == 1) {
            \Session::flash("debug", "Prišlo je do napake pri shranjevanju v bazo, razlog: polja vsebujejo preveč znakov");
            \DB::rollback();
        }
        else if($counter == 1){
            \Session::flash("debug", "Prišlo je do napake pri shranjevanju v bazo, razlog: manjkajoči podatki o študentu");
            \DB::rollback();
        }
        else{
            \Session::flash("debug", "Podatki so bili uspešno shranjeni!");
            \DB::commit();
        }

        return redirect()->back();
	}
}
