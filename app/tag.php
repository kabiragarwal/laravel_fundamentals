<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    
    protected $fillable= ['name'];
    
    public function articles(){
        return $this->belongsToMany('App\Article');
    }
}
