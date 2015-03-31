<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZaklenjeniIP extends Model {
    use SoftDeletes;
    protected $table = 'zaklenjeni_ip';
    protected $fillable = ['ip', 'datum_odklenitve'];
    protected $guarded = ['id'];
    public $timestamps = false;
}
