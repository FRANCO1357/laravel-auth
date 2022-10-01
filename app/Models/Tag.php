<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function Posts(){
        return $this->belongsToMany('App\Models\Post');
    }
}
