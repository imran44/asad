<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
     protected $table = 'address';
	 public $fillable = ['sector', 'city', 'country'];
    //
    public function restaurant()
    {
    	return $this->hasMany('App\Restaurant');
    }
}
