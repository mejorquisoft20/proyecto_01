<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    public function client(){
    	return $this->belongsTo('App\Clientes','id','id_cliente');
    }
}
