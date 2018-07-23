<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SecondaryScore;

class PrimarySubject extends Model
{
    public function SecondaryScore(){
    	return $this->hasMany(SecondaryScore::class);
    }
}
