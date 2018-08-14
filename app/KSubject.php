<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KSubject extends Model
{
    public function PrekScore(){
    	return $this->hasMany(PrekScore::class);
    }
}
