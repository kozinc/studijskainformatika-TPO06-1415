<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    protected $table = 'student';
    protected $fillable = ['vpisna', 'ime', 'priimek', 'email', 'geslo'];
    protected $guarded = ['id'];

    public function studijskiProgrami()
    {
        return $this->belongsToMany('App/Models/StudijskiProgram', 'student_program', 'id_programa', 'id_studenta');
    }

    public function Predmeti()
    {
        return $this->belongsToMany('App/Models/Predmet', 'student_predmet', 'id_predmeta', 'id_studenta');
    }
}
