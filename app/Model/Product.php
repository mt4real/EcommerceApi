<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Reviews;

class Product extends Model
{
  //  public $guarded=[];

	protected $fillable =[

     'name', 'detail', 'stock', 'price', 'discount'

	];

    public function reviews(){

   // return $this->hasMany('App\Model\Reviews', 'product_id');
    	return $this->hasMany(Reviews::class, 'product_id');
    }
}
