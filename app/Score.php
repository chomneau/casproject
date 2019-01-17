<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'student_id', 'grade_id', 'subject_id', 'quarter_1', 'quarter_2',
        'quarter_3','quarter_4'
    ];

    public function studentProfile(){
        return $this->belongsTo(StudentProfile::class);
    }

    public function subject(){
    	return $this->belongsTo(Subject::class);
    }

    public function grade(){
        return $this->belongsTo(grade::class);
    }

    
}
