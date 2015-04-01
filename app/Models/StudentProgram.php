<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class StudentProgram extends Model {

use SoftDeletes;
protected $table = 'student_program';
protected $fillable = ['letnik','vrsta_vpisa','studijsko_leto','nacin_studija','datum_vpisa', 'vloga_oddana', 'vloga_potrjena', 'prosta_izbira'];
protected $guarded = ['id', 'id_studenta', 'id_programa'];
public $timestamps = false;

    public function student()
    {
        return $this->belongsTo('App\Models\Student','id_studenta');
    }

    public function studijski_program()
    {
        return $this->belongsTo('App\Models\StudijskiProgram', 'id_programa');
    }


}