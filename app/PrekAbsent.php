<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrekAbsent extends Model
{
//    public function Absent(){
//        return $this->belongsTo(Absent::class);
//    }

    public function KLevel(){
        return $this->belongsTo(KLevel::class);
    }
    public function studentProfile()
    {
        return $this->belongsTo(StudentProfile::class);
    }
}
