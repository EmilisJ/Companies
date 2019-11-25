<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model{
    public function customer(){
       return $this->hasMany('App\Customer', 'company_id', 'id');
    }
}
