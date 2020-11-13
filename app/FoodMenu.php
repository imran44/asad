<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodMenu extends Model
{
    //
    protected $table = 'food_menu';

    public $fillable = ['item_id','restuarant_id','price','size','image'];
    //
    // public function items()
    // {
    // 	return $this->hasMany('App\Item');
    // }
}
