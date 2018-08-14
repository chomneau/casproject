<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrekScore extends Model
{
    protected $fillable = [
        'student_profile_id', 'k_level_id', 'k_subject_id', 'quarter_1', 'quarter_2',
        'quarter_3', 'quarter_4', 'yearly'
    ];

    public function studentProfile()
    {
        return $this->belongsTo(StudentProfile::class);
    }

    public function KSubject()
    {
        return $this->belongsTo(KSubject::class);
    }

    public function KLevel()
    {
        return $this->belongsTo(KLevel::class);
    }
}
