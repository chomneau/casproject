<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsentTeacher extends Model
{
    protected $fillable = [
        'teacher_id', 'absent_type', 'from', 'to'
    ];

    public function teacher(){

    	return $this->belongsTo(Teacher::class);
    }
}
