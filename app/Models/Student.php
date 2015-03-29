<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    protected $table = 'student';
    protected $fillable = ['vpisna', 'ime', 'priimek', 'email', 'geslo', 'emso', 'posta', 'datum_rojstva', 'obcina_rojstva'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function studijskiProgrami()
    {
        return $this->belongsToMany('App\Models\StudijskiProgram', 'student_program', 'id_programa', 'id_studenta');
    }

    public function Predmeti()
    {
        return $this->belongsToMany('App\Models\Predmet', 'student_predmet', 'id_predmeta', 'id_studenta');
    }
}
