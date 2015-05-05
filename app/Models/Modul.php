<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Modul
 * @package App\Models
 */

class Modul extends Model {

    /**
     * @property integer $id
     * @property string $ime
     * @property string $opis
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     **/
    use SoftDeletes;
    protected $table = 'modul';
    protected $fillable = ['id_programa','ime','opis', 'letnik', 'studijsko_leto'];
    protected $guarded = ['id'];
    protected $dates = ['created_at','deleted_at','updated_at'];
    public $timestamps = false;

    public function predmeti($studijsko_leto=false)
    {
        if($studijsko_leto){
            return $this->belongsToMany('App\Models\Predmet', 'program_predmet', 'id_modula', 'id_predmeta')->withPivot('letnik', 'studijsko_leto', 'tip', 'semester')->wherePivot('studijsko_leto','=',$studijsko_leto)->orderBy('letnik', 'semester', 'asc');
        }
        return $this->belongsToMany('App\Models\Predmet', 'program_predmet', 'id_modula', 'id_predmeta')->withPivot('letnik', 'studijsko_leto', 'tip', 'semester')->orderBy('letnik', 'semester', 'asc');
    }


    public function programi()
    {
        return $this->belongsTo('App\Models\StudijskiProgram', 'id_programa');
    }

 }
 