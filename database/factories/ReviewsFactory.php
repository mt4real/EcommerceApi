<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Reviews;
use Faker\Generator as Faker;
use App\Model\Product;

$factory->define(Reviews::class, function (Faker $faker) {
    return [
        //
        'product_id'=>function(){

        	return Product::all()->random();
        },

        'customer'=>$faker->name,
        'review'=>$faker->paragraph,
        'rating'=>$faker->numberBetween(0,5)
    ];
});
