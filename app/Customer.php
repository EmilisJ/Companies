<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model{
    public function company(){
       return $this->belongsTo('App\Company', 'company_id', 'id');
   }
}
