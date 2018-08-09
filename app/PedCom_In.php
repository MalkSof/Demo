<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedCom_In extends Model
{
    //
    protected $table = 'ped_com_in';


    protected $fillable = ['pedcom_id','ingrediente_id'];

    
}
