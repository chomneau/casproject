<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsentRecord extends Model
{
//    public function absent(){
//        return $this->belongsTo(Absent::class);
//    }

    public function grade(){
        return $this->belongsTo(Grade::class);
    }
    public function studentProfile()
    {
        return $this->belongsTo(StudentProfile::class);
    }
}
