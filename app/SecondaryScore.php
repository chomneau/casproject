<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SecondaryLevel;
use App\PrimarySubject;
use App\studentProfile;

class SecondaryScore extends Model
{
    protected $fillable = [
        'student_id', 'secondary_level_id', 'primary_subject_id', 'gpa_1', 'gpa_2',
        'midterm_score_1','midterm_score_2'
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
