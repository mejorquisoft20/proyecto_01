<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    public function client(){
    	return $this->belongsTo('App\Clientes','id','id_cliente');
    }
}
