<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nosilec extends Model {

    use SoftDeletes;
    protected $table = 'nosilec';
    protected $fillable = ['ime','priimek', 'vloga','geslo','email' ];
    protected $guarded = ['id'];
    protected $dates = ['created_at','deleted_at','updated_at'];

    public function predmeti()
    {
        return $this->hasMany('App\Models\Predmet', 'id_nosilca');
    }

}
