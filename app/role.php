<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class role extends Model
{
    //
    use SoftDeletes; 
    public function stuffs()
    {
        return $this->belongsToMany('App\stuff','App\stuff_roles','role_id','stuff_id');
    } 
   
}
