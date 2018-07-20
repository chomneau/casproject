<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Admin;

class Category extends Model
{
    public function admin(){
        return $this->belongsTo('App\Admin');
    }

    public function job(){
        return $this->hasMany(Job::class);
    }
}
