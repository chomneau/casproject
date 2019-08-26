<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{

	use Notifiable;
    protected $guard = 'teacher';

     protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'gender', 
        'date_of_birth', 
        'position', 
        'degree', 
        'password', 
        
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    public function Assignment(){

        return $this->hasMany(Assignment::class);

    }

    public function AbsentTeacher(){

        return $this->hasMany(AbsentTeacher::class);

    }

    public function Lessonplan()
    {
        return $this->hasMany(Lessonplan::class);
    }
    public function Gradefile()
    {
        return $this->hasMany(GradeFile::class);
    }

    public function GradeProfile(){

        return $this->belongsTo(GradeProfile::class);

    }



}
