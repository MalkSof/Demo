<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beraja extends Model
{
    //
    public function beraja()
    {
         return $this->hasMany('App\Comida');
    }
}
