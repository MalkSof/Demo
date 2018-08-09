<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ComidaTablaSeed::class);
         $this->call(CuponsTableSeeder::class);

    }
}
