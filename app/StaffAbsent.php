<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffAbsent extends Model
{
    protected $fillable = [
        'staff_id', 'absent_type', 'from', 'to'
    ];

    public function staff(){

    	return $this->belongsTo(Staff::class);
    }
}
