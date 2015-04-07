<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referent extends Model {

	protected $table = 'referent';
    protected $fillable = ['uporabnisko_ime','ime','priimek', 'email', 'geslo'];
    protected $guarded = ['id'];
    public $timestamps = false;

}
