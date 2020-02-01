<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RouteImage extends Model
{
    public function route(){
        return $this->belongsTo('App\route');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
