<?php
use App\Beraja ; 

function imagenProducto($path)
{
	

	if (isset($path)) {
		# code..

		return  Voyager::image($path);
	}
	else
	{
		
		return Voyager::image( 'imagen_no_disponible.png');
	}
}
 function beraja($id)
{
	$hola = DB::table('berajots')->select('nombre')->where('id', $id)->get();
	# code...
	foreach ($hola as $key => $h) {
	# code...
		return $h->nombre;
	}
	
}
function stocknivel($cantidad)
{
	# code...
	   if ($cantidad >  setting('site.nivel_cantidad')) {
                                          # code...
      $stock = '<span class="badge badge-success"> Hay Disponibilidad</span>';
    }
    else if( $cantidad <=  setting('site.nivel_cantidad') && $cantidad > 0)
    {
      $stock =  '<span class="badge badge-warning">Poca Disponibilidad</span>' ;
    }
    else
    {
      $stock = '<span class="badge badge-danger">No Hay Disponibilidad</span>';
    }

    return $stock;
}
