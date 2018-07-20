<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'user_id','job_position', 'company_name', 'contract_type', 'industry_type',
        'start_month', 'start_year', 'end_month', 'end_year', 'description'
    ];
}
