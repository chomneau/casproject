<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeProfile extends Model
{
    public function studentProfile(){
    	return $this->hasMany(studentProfile::class);
    }
}
