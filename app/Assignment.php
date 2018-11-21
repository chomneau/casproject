<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    
    public function teacher(){

    	return $this->belongsTo(Teacher::class);
    }

    public function studentprofile(){

    	return $this->belongsTo(StudentProfile::class);
    }

    public function gradeProfile(){

        return $this->belongsTo(GradeProfile::class);
    }
}
