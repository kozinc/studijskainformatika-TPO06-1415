<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\MailHelper;

class Student extends Model {

    protected $table = 'student';
    protected $fillable = ['vpisna', 'ime', 'priimek', 'email', 'geslo', 'emso', 'naslov', 'obcina', 'posta', 'drzava', 'naslovZacasni', 'obcinaZacasni', 'postaZacasni', 'drzavaZacasni', 'datum_rojstva', 'posiljanje', 'obcina_rojstva', 'drzava_rojstva', 'davcna', 'drzavljanstvo', 'spol', 'telefon'];
    protected $guarded = ['id', 'ponastavitev_gesla', 'novo_geslo'];

    public $timestamps = false;

    public function studijskiProgrami()
    {
        return $this->belongsToMany('App\Models\StudijskiProgram', 'student_program', 'id_programa', 'id_studenta');
    }

    public function Predmeti()
    {
        return $this->belongsToMany('App\Models\Predmet', 'student_predmet', 'id_studenta','id_predmeta')->withPivot('ocena','semester','letnik','studijsko_leto');
    }

    public function predmetiVProgramu(StudijskiProgram $program, $letnik=0)
    {
        $predmeti = \DB::table('program_predmet')->where('id_programa','=',$program->id)->where('letnik','=',$letnik)->lists('id');
        $studentovi_predmeti = $this->Predmeti()->whereIn('predmet.id',$predmeti)->get();
        dd($predmeti, $studentovi_predmeti);
        return $predmeti;
    }

    public function polaganja()
    {
        return $this->belongsToMany('App\Models\IzpitniRok', 'student_izpit', 'id_studenta', 'id_izpitnega_roka' )->withPivot('ocena', 'tocke_izpita');
    }

    public function sklepi()
    {
        return $this->hasMany('App\Models\Sklep', 'id_studenta');
    }

    public function studentProgram()
    {
        return $this->hasMany('App\Models\StudentProgram', 'id_studenta')->orderBy('studijsko_leto','desc');

    }

    public function trenutniProgram(){
        return $this->studijskiProgrami()->withPivot('letnik', 'studijsko_leto', 'vrsta_vpisa', 'nacin_studija', 'datum_vpisa','vloga_potrjena')->wherePivot('studijsko_leto','=',date('y').'/'.date('Y',strtotime('+1 year')))->first();
    }

    public function trenutniPredmeti()
    {
        return $this->Predmeti()->withPivot('letnik','semester','studijsko_leto','ocena')->wherePivot('studijsko_leto','=',date('y').'/'.date('Y',strtotime('+1 year')));
    }

    public function passwordReset(){
        $new_password = str_random(15);
        $new_hash = \Hash::make($new_password);
        $this->novo_geslo = $new_hash;
        $this->ponastavitev_gesla = str_random(40);
        $ponastavitveni_link = $this->id.'-'.$this->ponastavitev_gesla;
        $this->save();
        $msg = '<h3> Ponastavitev gesla</h3><br>';
        $msg .= 'Za ponastavitev gesla kliknite <a href="'. action('LoginController@passwordResetPotrditev',['koda'=>$ponastavitveni_link]).'">TUKAJ</a>';
        $msg .= '<br><br>';
        $msg .= 'Po ponastavitivi bo vaše novo geslo: <b>'.$new_password.'</b>';
        $msg .= '<br><br> Lp, ekipa TPO6';
        $mailer = new MailHelper();
        $mailer->send('Referat FRI <noreply@tpo6.si>', $this->email, 'Ponastavitev gesla', $msg);
        return true;
    }

    public function passwordResetPotrditev($potrditev){
        if($this->ponastavitev_gesla == $potrditev){
            $this->geslo = $this->novo_geslo;
            $this->novo_geslo = null;
            $this->ponastavitev_gesla = null;
            $this->save();
            return true;
        }
        else return false;
    }
}

