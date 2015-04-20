<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudijskiProgram extends Model
{
    use SoftDeletes;
    protected $table = 'studijski_program';
    protected $fillable = ['ime', 'oznaka', 'opis', 'stopnja', 'trajanje_leta', 'stevilo_semestrov', 'KT', 'klasius_srv', 'kraj_izvajanja'];
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function predmeti()
    {
        return $this->belongsToMany('App\Models\Predmet', 'program_predmet', 'id_programa', 'id_predmeta')->withPivot('letnik', 'studijsko_leto', 'tip', 'semester')->orderBy('letnik', 'semester', 'asc');
    }

    public function moduli()
    {
        return $this->hasMany('App\Models\Modul', 'id_programa')->orderBy('letnik', 'asc');
    }

    public function studenti()
    {
        return $this->belongsToMany('App\Models\Student', 'student_program', 'id_studenta', 'id_programa');
    }

    public function letniki()
    {
        return $this->hasMany('App\Models\ProgramLetnik', 'id_programa')->orderBy('letnik','asc');
    }

}