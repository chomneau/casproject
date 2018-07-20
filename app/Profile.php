<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'avatar','user_id', 'first_name', 'last_name', 'sex',
        'date_of_birth', 'phone', 'address', 'location'
    ];
}
