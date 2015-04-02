<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudijskiProgram extends Model {


    use SoftDeletes;
    protected $table = 'studijski_program';
    protected $fillable = ['ime','oznaka','opis','stopnja','trajanje_leta','stevilo_semestrov','KT','klasius_srv', 'kraj_izvajanja'];
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function predmeti()
    {

        return $this->belongsToMany('App\Models\Predmet', 'program_predmet', 'id_programa', 'id_predmeta')->withPivot('letnik')->orderBy('letnik','semester','asc');

    }

    public function moduli()
    {
        return $this->belongsToMany('App\Models\Modul', 'program_modul', 'id_modula', 'id_programa')->withPivot('letnik')->orderBy('letnik','asc');
    }

    public function studenti()
    {
        return $this->belongsToMany('App\Models\Student', 'student_program', 'id_studenta', 'id_programa');
