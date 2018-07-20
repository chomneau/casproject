<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile;
use App\Experience;
use App\StudentProfile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function StudentProfile(){
        return $this->hasOne(StudentProfile::class);
    }

    public function Profile()
    {
        return $this->hasOne('App\Profile');
    }

    //relationship for user experience
    public function experience(){
        return $this->hasMany('App\Experience');
    }

    //relationship for user education (cv)

    public function education(){
        return $this->hasMany('App\UserEducation');
    }

    public function uploadcv()
    {
        return $this->hasMany(Uploadcv::class);
    }

}
