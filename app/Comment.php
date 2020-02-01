<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    public $primaryKey = 'id';
    // timestamps
    public $timestamps = true;
    
    public function route(){
        return $this->belongsTo('App\Route');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}    
