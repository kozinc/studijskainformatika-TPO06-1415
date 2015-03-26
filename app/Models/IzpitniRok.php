<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IzpitniRok extends Model {

    use SoftDeletes;
    protected $table = 'izpitni_rok';
    protected $fillable = ['izpitni_rok', 'datum', 'studijsko_leto'];
    protected $guarded = ['id_predmeta'];
    public $timestamps = false;

    public function predmet()
    {
        return $this->belongsTo('App\Models\Predmet','id_predmeta');
    }

    public function studenti()
    {
        return $this->belongsToMany('App\Models\Student','student_izpit','id_studenta','id_izpita');
    }





}
