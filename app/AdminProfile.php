<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    protected $fillable = [
        'admin_id', 'avatar', 'phone', 'address', 'about'
    ];

    public function Admin(){
       return $this->belongsTo('App\Admin');
    }
}
