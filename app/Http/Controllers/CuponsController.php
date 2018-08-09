<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cupon;
use Gloudemans\Shoppingcart\Facades\Cart;


class CuponsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cupon = Cupon::where('codigo',$request->cupon_cod)->first();
        

        if (!$cupon) {
            

            return redirect()->route('checkout.index')->withErrors('Cupon invalido. Por favor intente de nuevo');
        }
        
            $descuentoposta = $cupon->descuento(Cart::subtotal());
            
        session()->put('cupon',[
            'nombre' =>$cupon->codigo,
            'descuento' =>  $descuentoposta,

        ]);

        return redirect()->route('checkout.index')->with('success_message','El descuento fue aplicado');
    }



    /**
     * Remove the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('cupon');
       
        return redirect()->route('checkout.index')->with('success_message','El cupon fue eliminado');
    }
}
