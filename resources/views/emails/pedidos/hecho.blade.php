





@component('mail::message')
BH

Pedido recibido

Muchas gracias por pedir en Aieka

**Pedido ID:** {{ $pedido->id }}
Total : {{ $pedido->total }}
<?php

 $comidas = DB::table('pedido_producto')
            ->join('pedidos', 'pedido_producto.pedido_id', '=', 'pedidos.id')
            ->join('comidas', 'pedido_producto.comida_id', '=', 'comidas.id')
            ->select('pedido_producto.*', 'comidas.nombre','comidas.precio')->where('pedido_producto.pedido_id', $pedido->id)->get();

            ?>
@foreach ($comidas as $com)

Nombre: {{ $com->nombre }}<br>
Precio: ${{ $com->precio }}<br>
Cantidad {{ $com->cantidad }}

@endforeach









@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Ir al Sitio
@endcomponent

Muchas gracias<br>
{{ config('app.name') }}
@endcomponent