<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    protected $fillable = [
        'user_id','school_name', 'degree', 'study_field',
        'start_month', 'start_year', 'end_month', 'end_year'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
