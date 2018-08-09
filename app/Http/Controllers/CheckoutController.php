<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Pedido;
use auth;
use App\User;
use App\PedidoProducto;
use App\PedCom_In;
use App\Mail\PedidoHecho;
use Illuminate\Support\Facades\Mail;
use App\Comida;

class CheckoutController extends Controller
{
     protected function disminuirCantidad()
    {
        foreach (Cart::content() as $item) {
            $comida = Comida::find($item->model->id);
            $comida->update(['unidad' => $comida->unidad - $item->qty]);
        }
    }
    protected function comidaNoDisponible($value='')
    {
        foreach (Cart::content() as  $item) {
            $comida = Comida::find($item->model->id);
            if ($comida->unidad < $item->qty) {
                return true ;
            }
        }
        return false;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $descuento = session()->get('cupon')['descuento'] ?? 0;
        $newtotal = (Cart::subtotal() - $descuento);
        return view('checkout')->with([
            'descuento' =>$descuento,
            'newtotal' => $newtotal,


        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

        if ($this->comidaNoDisponible()) {
            # code...
            return back()->withErrors('Perdon. No tenemos disponibilidad de algunas cosas que pedis');
        }

        $fecha = session()->get('fecha');
           

        $pedido = Pedido::create([
            'user_id' => Auth::user()->id,
            'pago' => '',
            'total' => $request->total,
            'fecha' => $fecha,
            'mesa' =>  (int)$request->mesa
        ]);
        foreach (Cart::content() as  $item) {
            # code...
            $pedcom = PedidoProducto::create([
                'pedido_id' => $pedido->id,
                'comida_id' => $item->model->id,
                'cantidad' => $item->qty,
                'instrucciones' => $item->options[1],
            ]);

            
            foreach ($item->options[0] as $in) {
                # code...
                
                PedCom_In::create([
                    'pedcom_id' => $pedcom->id,
                    'ingrediente_id' => $in
                ]);

            }



        }
        Mail::send(new PedidoHecho($pedido));
        $this->disminuirCantidad();
          Cart::destroy();
        session()->forget('cupon');
        return view('gracias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
