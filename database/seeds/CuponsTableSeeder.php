<?php

use Illuminate\Database\Seeder;
use App\Cupon;

class CuponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Cupon::create([
        	'codigo' => 'ABCD23',
        	'tipo' => 'fijo',
        	'valor' => '50',

        ]);
         Cupon::create([
        	'codigo' => 'ABC23213',
        	'tipo' => 'porcentaje',
        	'porcentaje_off' => '20',

        ]);

    }
}
