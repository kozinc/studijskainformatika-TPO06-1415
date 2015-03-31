<?php namespace App\Http\Controllers;

class VpisniListController extends Controller {

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
    public function obrazecVpisniList(){

        $student = \App\Models\Student::where ('email', '=', 'nezabelej@gmail.com')->first();
        //$student_program = \App\Models\StudentProgram::where ('id_studenta', '=', $student->id);
        //id_programa (in kar sledi iz programa), vrsta_vpisa, nacin_studija, letnik se prebere iz zetona
        //recimo da je id_programa 1
        //$studijski_program = \App\Models\StudijskiProgram::find(1);
       // return $studijski_program->ime;

        return view('vpisnilist',['vpisnaStevilka'=> $student->vpisna,
                                  'ime' => $student->ime,
                                  'priimek' => $student->priimek,
                                  'datum_rojstva' => $student->datum_rojstva,
                                  'obcina_rojstva' => $student->obcina_rojstva,
                                  'drzava_rojstva' => $student->drzava_rojstva,
                                  'emso' => $student->emso,
                                  'davcna' => $student->davcna,
                                  'spol' => $student->spol,
                                  'naslov' => $student->naslov,
                                  'posta' => $student->posta,
                                  'kraj' => $student->kraj,
                                  'drzava' => $student->drzava,
                                  'drzavljanstvo' => $student->drzavljanstvo,
                                  'email' => $student->email,
                                  'telefon' => $student->telefon,
                                  'studijski_program' => "Imeštpr"
        ]);

    }
}