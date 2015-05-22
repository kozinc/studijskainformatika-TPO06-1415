<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PredmetNosilec extends Model {

	//
    protected $table = 'predmet_nosilec';
    protected $fillable = ['id_predmeta','studijsko_leto','id_nosilca', 'id_nosilca2','id_nosilca3' ];
    protected $guarded = ['id'];



    public function predmet()
    {
        return $this->belongsTo('App\Models\Predmet');
    }

    public function nosilec()
    {
        return $this->belongsTo('App\Models\Nosilec','id_nosilca');
    }
    public function nosilec2()
    {
        return $this->belongsTo('App\Models\Nosilec','id_nosilca2');
    }
    public function nosilec3()
    {
        return $this->belongsTo('App\Models\Nosilec','id_nosilca3');
    }






}
