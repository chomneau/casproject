<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function teacher(){

    	return $this->belongsTo(Teacher::class);
    }

    public function StaffAbsent(){

        return $this->hasMany(StaffAbsent::class);

    }
}
