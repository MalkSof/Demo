<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    //
    

    public static function encuentraPorCodigo($codigo)
    {
    	return self::where('codigo',$codigo)->first();
    }
    public function descuento($total)
    {
    	
    	if ($this->tipo == "fijo") {
    		return $this->valor;
    	}elseif ($this->tipo == "porcentaje") {
    		return ($this->porcentaje_off/100) * $total;
    	}else
    	{
    		return 0;
    	}
    }
}
