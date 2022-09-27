<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discussionReply extends Model
{
    use HasFactory;

    Public function discussion(){
        return $this->belongsTo('App/Models/discussion');
    }
   
    Public function user(){
        return $this->belongsTo('App\Models\user');
    }
}
