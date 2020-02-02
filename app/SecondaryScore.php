<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SecondaryLevel;
use App\PrimarySubject;
use App\studentProfile;

class SecondaryScore extends Model
{
    protected $fillable = [
        'student_profile_id', 'secondary_level_id', 'primary_subject_id', 'quarter_1', 'quarter_1', 'quarter_2', 'quarter_3', 'quarter_4',
        'semester_1','semester_2', 'midterm', 'yearly',
    ];

    public function studentProfile(){
        return $this->belongsTo(StudentProfile::class);
    }

    public function PrimarySubject(){
    	return $this->belongsTo(PrimarySubject::class);
    }

    public function secondaryLevel(){
        return $this->belongsTo(SecondaryLevel::class);
    }

  

    
}
