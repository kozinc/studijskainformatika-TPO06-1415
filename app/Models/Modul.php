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
    protected $fillable = ['ime','opis'];
    protected $guarded = ['id'];
    protected $dates = ['created_at','deleted_at','updated_at'];
    public $timestamps = false;

    public function predmeti()
    {
        return $this->hasMany('App\Models\Predmet','id_modula');
    }

    public function programi()
    {
        return $this->belongsToMany('App\Models\StudijskiProgram', 'program_modul', 'id_programa', 'id_modula');
    }

 }
 