<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Model\Product;


class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return[
                
        'name'=>$this->name,
        'totalPrice'=>round((1-($this->discount/100))*$this->price, 2),
        'rating'=> $this->reviews->count()>0?round($this->reviews->sum('rating')/$this->reviews->count(),2):'No rating yet',
        'href'=>[
           
           'link'=>route('products.show',$this->id)



        ],

        'reviews'=>PostCollection::collection($this->whenLoaded('reviews'))

          

        ];



        //         return [
        //     'data' => $this->collection->transform(function($product){
        //         return [
        //             'name'=>$product->name,
        //  'description'=>$product->detail,
        //  'price'=>$product->price,
        //  'stock'=>$product->stock==0?'Out of Stock':$product->stock,
        //  'discount'=>$product->discount,
        //  'totalPrice'=>round((1-($product->discount/100))*$product->price, 2),
        //         ];
        //     }),
        // ];
    }
}
       