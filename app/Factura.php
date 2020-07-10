<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    public function client(){
    	return $this->belongsTo('App\Client','ci','CI');
    }
}
