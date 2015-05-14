<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PredmetNosilec extends Model {

	//
    protected $table = 'predmet_nosilec';
    protected $guarded = ['id'];
    protected $fillable = ['id_predmeta','id_nosilca', 'id_nosilca2','id_nosilca3','studijsko_leto' ];

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
    public function predmet()
    {
        return $this->belongsTo('App\Models\Predmet','id_predmeta');
    }



}
