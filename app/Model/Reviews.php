<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;

class Reviews extends Model
{
   
   protected $fillable =[

     'customer', 'rating', 'review'

	];

     public function product(){

    	
        //  return $this->belongsTo('App\Model\Product');
    	return $this->belongsTo(Product::class);
    }
}
