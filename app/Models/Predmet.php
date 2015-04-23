<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Predmet extends Model {

    use SoftDeletes;
    protected $table = 'predmet';
    protected $fillable = ['sifra','naziv','opis','id_nosilca','KT'];
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function studijski_programi()
    {
        return $this->belongsToMany('App\Models\StudijskiProgram', 'program_predmet', 'id_predmeta','id_programa');
    }

    public function nosilec()
    {
        return $this->belongsTo('App\Models\Nosilec','id_nosilca');
    }

    public function izpitni_roki()
    {
        return $this->hasMany('App\Models\IzpitniRok','id_predmeta');
    }

    public function studenti()
    {
        return $this->belongsToMany('App\Models\Student', 'student_predmet', 'id_studenta', 'id_predmeta');
    }


}
