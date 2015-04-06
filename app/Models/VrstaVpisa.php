<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VrstaVpisa extends Model {

    protected $table = 'vrsta_vpisa';
    protected $fillable = ['ime','mozni_letniki'];
    protected $guarded = ['sifra'];



}
