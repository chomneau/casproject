<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function admin(){
        return $this->belongsTo('App\Admin');
    }

    public function employer(){
        return $this->belongsTo('App\Employer');
    }

    //user
    public function user(){
        return $this->belongsTo('App\User');
    }


    //company.php
    public function job(){
        return $this->hasMany(Job::class);
    }

    public function note()
    {
        return $this->hasMany('App\Note');
    }

    public function companyType()
    {
        return $this->belongsTo(CompanyType::class);
    }

    public function industryType(){
        return $this->belongsTo(IndustryType::class);
    }

    protected $fillable  = [
        'user_id', 'category_id', 'companyName', 'contactPerson', 'employeeSize', 'type', 'industryType',
        'email', 'phone', 'website', 'address', 'logo', 'location'
    ];
}
