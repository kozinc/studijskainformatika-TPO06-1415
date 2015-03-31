<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZakIp extends Model {
    protected $table = 'zaklenjeni_ip';
    protected $fillable = ['ip', 'datum_odklenitve'];
    protected $guarded = ['id'];
    public $timestamps = false;
}
