<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{

    protected $fillable = [
        'user_id', 'photo', 'email', 'studentId', 'sex',
        'dateOfBirth','PassgressiveBookId','parentName','career','phone',
        'address'
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }

    //profile has many score
    public function Score(){
        return $this->hasMany(Score::class);
    }


    public function Assignment(){
        return $this->hasMany(Assignment::class);
    }

    public function GradeProfile(){
        return $this->belongsTo(GradeProfile::class);
    }
}
