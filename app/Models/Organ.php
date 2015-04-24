<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organ extends Model {

    protected $table = 'organ';
    protected $fillable = ['id', 'ime'];
    public $timestamps = false;

    public function sklepi()
    {
        return $this->hasMany('App\Models\Sklep', 'id_organa');
    }

}
