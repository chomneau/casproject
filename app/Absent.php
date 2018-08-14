<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    public function AbsentRecord(){
        return $this->hasMany(AbsentRecord::class);
    }
}
