<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustryType extends Model
{
    public function company(){
        return $this->hasMany(Company::class);
    }
}
