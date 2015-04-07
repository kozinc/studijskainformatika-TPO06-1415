<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentPredmet extends Model {

	use SoftDeletes;
    protected $table = 'student_predmet';
    protected $fillable = ['letnik','semester','studijsko_leto','ocena','id_studenta', 'id_predmeta'];
    protected $guarded = ['id','zeton_veljavnost'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    public $timestamps = false;

    public function student()
    {
        return $this->belongsTo('App\Models\Student','id_studenta');
    }

    public function predmet()
    {
        return $this->belongsTo('App\Models\Predmet', 'id_predmeta');
    }


}
