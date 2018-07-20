<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function Grade(){
        return $this->belongsTo(Grade::class);
    }

    public function Score(){
    	return $this->hasMany(Score::class);
    }
}
