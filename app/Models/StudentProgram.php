<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentProgram extends Model {

    use SoftDeletes;

    protected $table = 'student_program';

    protected $fillable = ['vrsta_vpisa','nacin_studija','datun_vpisa','studijsko_leto'];

    protected  $guarded = ['id','id_studenta','id_programa'];

    public function student()
    {
        return $this->belongsTo('App\Models\Student','id_studenta');
    }

    public function program()
    {
        return $this->belongsTo('App\Models\StudijskiProgram','id_programa');
    }

}
