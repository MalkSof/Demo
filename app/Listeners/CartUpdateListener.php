<?php

namespace App\Listeners;

use App\Cupon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\UpdateCupon;

class CartUpdateListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     *
     * @return void
     */
    public function handle( $event)
    {
        //
        $cuponnombre = session()->get('cupon')['nombre'];

      
            # code..

            
            
            
        
    }
}
