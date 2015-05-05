<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class StudentProgram extends Model {

protected $table = 'student_program';
protected $fillable = ['letnik','vrsta_vpisa','studijsko_leto','nacin_studija','datum_vpisa', 'vloga_oddana', 'vloga_potrjena', 'prosta_izbira'];
protected $guarded = ['id', 'id_studenta', 'id_programa'];
public $timestamps = false;

    public function studijski_program()
    {
        return $this->belongsTo('App\Models\StudijskiProgram', 'id_programa');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'id_studenta');
    }

    public function vrstaVpisa()
    {
        return $this->belongsTo('App\Models\VrstaVpisa', 'vrsta_vpisa', 'sifra');
    }


    public function moduli($studijsko_leto, $studentProgram)
    {
        $studentPredmeti = StudentPredmet::where('id_studenta','=',$this->id_studenta)->where('studijsko_leto','=',$studijsko_leto)->get();
        $program = $studentProgram->studijski_program;
        $moduli = $return_moduli = [];
        $predmeti = [];
        foreach($studentPredmeti as $sp)
        {
            $predmeti[] = $sp->id_predmeta;
        }
        $programPredmeti = $program->predmeti($studijsko_leto)->wherePivot('tip','=','modulski')->whereIn('predmet.id',$predmeti)->get();
        foreach($programPredmeti as $predmet)
        {
            if(!isset($moduli[$predmet->pivot->id_modula])){
                $moduli[$predmet->pivot->id_modula] = 1;
            }elseif($moduli[$predmet->pivot->id_modula] == 2){
                $return_moduli[] = $predmet->pivot->id_modula;
            }else{
                $moduli[$predmet->pivot->id_modula]++;
            }
        }
        return Modul::whereIn('id', $return_moduli);
    }

    public static function nepotrjeneVloge(){
        return StudentProgram::whereNotNull('vloga_oddana')->whereNull('vloga_potrjena')->get();
    }

    /**
     * @return bool
     */
    public function potrdi(){
        $this->vloga_potrjena = date('Y-m-d');
        $this->datum_vpisa = date('Y-m-d');
        $status = $this->save();
        return $status;
    }


}