<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KLevel extends Model
{
    public function PrekScore(){
    	return $this->hasMany(PrekScore::class);
    }
}
