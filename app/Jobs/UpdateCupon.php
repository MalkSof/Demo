<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Cupon;

class UpdateCupon implements ShouldQueue
{
    private $cupon;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($cupon)
    {
        //

        $this->cupon = $cupon;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
            
                session()->put('cupon',[
                'nombre' => $cupon->codigo,
                'descuento' => $cupon->descuento(Cart::subtotal()),
            ]);
            
    }
}
