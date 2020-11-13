<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model {

	public $fillable = ['title', 'catagory_id', 'description'];

	public function catagory() {
		return $this->belongsTo('App\Category');
	}

}
