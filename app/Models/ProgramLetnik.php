<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramLetnik extends Model {


    protected $table = 'program_letnik';
    protected $fillable = ['id_programa', 'letnik', 'KT','stevilo_obveznih_predmetov', 'stevilo_strokovnih_predmetov','stevilo_prostih_predmetov', 'stevilo_kt_modulskih','stevilo_modulov'];
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function program()
    {
        return $this->belongsTo('App\Models\StudijskiProgram', 'id_programa');
    }
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
    }

}
