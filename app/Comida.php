<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ingrediente;
use auth;
use App\Beraja;

class Comida extends Model
{
	protected $fillable = ['unidad','cantidad'];
    //
    /*public function presentPrice()
    {
    	setlocale(LC_MONETARY, 'es_AR');
    	return money_format('%i', $this->precio);
    }
    */
    public function ingrediente()
    {
    	return $this->belongsToMany('App\Ingrediente');
    }
    public function beraja()
    {
    	return Beraja::where('id',$this->beraja_id)->first()->beraja;
    }
   

}
