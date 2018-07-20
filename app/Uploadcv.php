<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploadcv extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
