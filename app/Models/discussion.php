<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discussion extends Model
{
    use HasFactory;
    public function forum(){
        return $this->belongsTo('App\Models\forum');
    }
    Public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
    Public function user(){
        return $this->belongsTo('App\Models\user');
    }
    Public function replies(){
        return $this->hasMany('App\Models\discussionReply');
    }
}
