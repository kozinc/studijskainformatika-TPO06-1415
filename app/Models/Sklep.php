<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sklep extends Model {

    use SoftDeletes;
    protected $table = 'sklep';
    protected $fillable = ['id', 'id_studenta', 'datum', 'vsebina'];
    protected $dates = ['deleted_at', 'updated_at'];
    public $timestamps = false;

    public function student()
    {
        return $this->hasMany('App\Models\Student', 'id_studenta');
    }

}
