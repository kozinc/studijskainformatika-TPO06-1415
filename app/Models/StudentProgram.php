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

    public static function nepotrjeneVloge(){
        return StudentProgram::whereNotNull('vloga_oddana')->whereNull('vloga_potrjena')->get();
    }

    /**
     * @return bool
     */
    public function potrdi(){
        $this->vloga_potrjena = date('Y-m-d');
        $status = $this->save();
        return $status;
    }


}