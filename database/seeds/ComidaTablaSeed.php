<?php

use Illuminate\Database\Seeder;
use App\Comida;

class ComidaTablaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

          Comida::create([
            'nombre' => 'Empanada',
            'slug' => 'empa',
            'detalle' => 'excelente comida',
            'precio' => 30,
            'descripcion' =>'asddasddsddsa',

        ]);
        Comida::create([
            'nombre' => 'Salchico',
            'slug' => 'sal',
            'detalle' => 'excelente comida',
            'precio' => 30,
            'descripcion' =>'asddasddsddsa',

        ]);


    }
}
