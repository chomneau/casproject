<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondaryAbsent extends Model
{
    public function Absent(){
        return $this->belongsTo(Absent::class);
    }

    public function SecondaryLevel(){
        return $this->belongsTo(SecondaryLevel::class);
    }
    public function studentProfile()
    {
        return $this->belongsTo(StudentProfile::class);
    }
}
