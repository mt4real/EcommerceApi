<?php

namespace App\Exceptions;


use App\Exceptions\ExceptionTrait;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Throwable;


 //use Illuminate\Auth\AuthenticationException; 
 



class Handler extends ExceptionHandler
{

     use ExceptionTrait;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];




    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)

    {
         if ($request->expectsJson()) {
             # code...
       return  $this->apiException($request, $exception);

    }
        return parent::render($request, $exception);

       // dd($exception);
            }


//     protected function unauthenticated($request, AuthenticationException $exception){
// if ($request->expectsJson()) {
//    return response()->json(['isAuth'=>false, 'message' => $exception->getMessage()], 401);
// }
// $guard = array_get($exception->guards(),0);
//     switch ($guard) {
//         default:
//             $login = 'login';
//             break;
//     }return redirect()->guest(route($login));}


}
