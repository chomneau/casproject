<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function Subject(){
        return $this->hasMany(Subject::class);
    }

    public function score(){
    	return $this->hasMany(Score::class);
    }
}
