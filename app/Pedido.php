<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comida;

class Pedido extends Model
{
    //
    protected $fillable =['id','user_id', 'pago','total','fecha','mesa','direccion', 'cuidad','postal','entrega','hora'];
           
      
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function comidas()
    {
    	return $this->belongsToMany('App\Comida')->withPivot('cantidad');
    }
}
