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

    public function predmeti($studijsko_leto=false)
    {
        if($studijsko_leto){
            return $this->belongsToMany('App\Models\Predmet', 'program_predmet', 'id_programa', 'id_predmeta')->withPivot('letnik', 'studijsko_leto', 'tip', 'semester')->wherePivot('studijsko_leto','=',$studijsko_leto)->orderBy('letnik', 'semester', 'asc');
        }
        return $this->belongsToMany('App\Models\Predmet', 'program_predmet', 'id_programa', 'id_predmeta')->withPivot('letnik', 'studijsko_leto', 'tip', 'semester')->orderBy('letnik', 'semester', 'asc');
    }

    public function obvezni_predmeti($studijsko_leto,$letnik=0)
    {
        if($letnik > 0){
            return $this->belongsToMany('App\Models\Predmet', 'program_predmet', 'id_programa', 'id_predmeta')->withPivot('letnik', 'studijsko_leto', 'tip', 'semester')->wherePivot('letnik','=',$letnik)->withPivot('letnik', 'studijsko_leto', 'tip', 'semester')->wherePivot('tip','=','obvezni')->wherePivot('studijsko_leto','=',$studijsko_leto)->orderBy('letnik', 'semester', 'asc');
        }
        return $this->belongsToMany('App\Models\Predmet', 'program_predmet', 'id_programa', 'id_predmeta')->withPivot('letnik', 'studijsko_leto', 'tip', 'semester')->wherePivot('tip','=','obvezni')->wherePivot('studijsko_leto','=',$studijsko_leto)->orderBy('letnik', 'semester', 'asc');
    }

    public function strokovni_predmeti($studijsko_leto,$letnik=0)
    {
        if($letnik > 0){
            return $this->belongsToMany('App\Models\Predmet', 'program_predmet', 'id_programa', 'id_predmeta')->withPivot('letnik', 'studijsko_leto', 'tip', 'semester')->wherePivot('letnik','=',$letnik)->withPivot('letnik', 'studijsko_leto', 'tip', 'semester')->wherePivot('tip','=','splošno-izbirni')->wherePivot('studijsko_leto','=',$studijsko_leto)->orderBy('letnik', 'semester', 'asc');
        }
        return $this->belongsToMany('App\Models\Predmet', 'program_predmet', 'id_programa', 'id_predmeta')->withPivot('letnik', 'studijsko_leto', 'tip', 'semester')->wherePivot('tip','=','splošno-izbirni')->wherePivot('studijsko_leto','=',$studijsko_leto)->orderBy('letnik', 'semester', 'asc');
    }

    public function prosti_predmeti($studijsko_leto,$letnik=0)
    {
        if($letnik > 0){
            return $this->belongsToMany('App\Models\Predmet', 'program_predmet', 'id_programa', 'id_predmeta')->withPivot('letnik', 'studijsko_leto', 'tip', 'semester')->wherePivot('letnik','=',$letnik)->withPivot('letnik', 'studijsko_leto', 'tip', 'semester')->wherePivot('tip','=','splošno-izbirni')->wherePivot('studijsko_leto','=',$studijsko_leto)->orderBy('letnik', 'semester', 'asc');
        }
        return $this->belongsToMany('App\Models\Predmet', 'program_predmet', 'id_programa', 'id_predmeta')->withPivot('letnik', 'studijsko_leto', 'tip', 'semester')->wherePivot('tip','=','splošno-izbirni')->wherePivot('studijsko_leto','=',$studijsko_leto)->orderBy('letnik', 'semester', 'asc');
    }

    public function predmet($id_predmeta, $studijsko_leto)
    {
        return $this->belongsToMany('App\Models\Predmet', 'program_predmet', 'id_programa', 'id_predmeta')->withPivot('letnik', 'studijsko_leto', 'tip', 'semester')->wherePivot('id_predmeta','=',$id_predmeta)->wherePivot('studijsko_leto','=',$studijsko_leto)->first();
    }

    public function moduli($studijsko_leto=false, $letnik=0)
    {
        $query = $this->hasMany('App\Models\Modul', 'id_programa');
        if($studijsko_leto){
            $query = $query->where('studijsko_leto','=',$studijsko_leto);
        }
        if($letnik > 0){
            $query = $query->where('letnik','=',$letnik);
        }
        return $query->orderBy('letnik', 'asc');
    }

    public function studenti()
    {
        return $this->belongsToMany('App\Models\Student', 'student_program', 'id_studenta', 'id_programa');
    }

    public function letniki()
    {
        return $this->hasMany('App\Models\ProgramLetnik', 'id_programa')->orderBy('letnik','asc');
    }

    public function letnik($letnik)
    {
        return $this->hasMany('App\Models\ProgramLetnik', 'id_programa')->where('letnik','=',$letnik)->first();
    }

    public function studijska_leta()
    {
        $results = \DB::table('program_predmet')->select('studijsko_leto')->where('id_programa','=',$this->id)->distinct()->orderBy('studijsko_leto','desc')->get();
        $leta = [];
        if(!empty($results))
        {
            foreach($results as $row){
                $leto = substr($row->studijsko_leto,0,4).'-'.substr($row->studijsko_leto,7);
                array_push($leta,$leto);
            }
        }
        return $leta;
    }

}