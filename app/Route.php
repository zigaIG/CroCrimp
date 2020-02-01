<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    //
    protected $table = 'routes';
    public $primaryKey = 'id';
    // timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function sector(){
        return $this->belongsTo('App\Sector');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function route_image(){
        return $this->hasMany('App\RouteImage');
    }
}