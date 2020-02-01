<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    
    //Primary key iz tablice spots
    protected $table = 'spots';
    public $primaryKey = 'id';
    // timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function setors(){
        return $this->hasMany('App\Sector');
    }
}
