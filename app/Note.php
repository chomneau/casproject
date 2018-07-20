<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;

class Note extends Model
{

    protected $fillable = [
        'title','body'
    ];
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
