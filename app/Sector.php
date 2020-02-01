<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    //Primary key iz tablice spots
    protected $table = 'sectors';
    public $primaryKey = 'id';
    // timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function spot(){
        return $this->belongsTo('App\Spot');
    }
    public function routes(){
        return $this->hasMany('App\Route');
    }
}