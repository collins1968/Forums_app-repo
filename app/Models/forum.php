<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forum extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
       
            return $this->belongsTo('App\Models\Category');
        }
    public function discussion(){
       
            return $this->hasMany('App\Models\discussion');
        }
        public function posts(){
       
            return $this->hasMany('App\Models\post');
        }
    }

