<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondaryLevel extends Model
{
    public function SecondaryScore(){
    	return $this->hasMany(SecondaryScore::class);
    }
}
