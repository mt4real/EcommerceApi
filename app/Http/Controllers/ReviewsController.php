<?php

namespace App\Http\Controllers;

use App\Model\Reviews;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use Symfony\Component\HttpFoundation\Response;
use Auth;

//use App\Http\Resources\ProductCollection;


class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

       public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }


    public function index(Product $product)
    {
        //return Reviews::all();

        return  ReviewResource::collection($product->reviews->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request, Product $product)
    {
        
        $review=new Reviews($request->all());

        $product->reviews()->save($review);

        return response([
          'data' => new ReviewResource($review)

        ], Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function show(Reviews $reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function edit(Reviews $reviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Reviews $review)
    {
        
         $review->update($request->all());

                return response([
          'data' => new ReviewResource($review)

        ], Response::HTTP_CREATED);

    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Reviews $review)
    {
        $review->delete();

             return response(null, Response::HTTP_NO_CONTENT);

    }
}
