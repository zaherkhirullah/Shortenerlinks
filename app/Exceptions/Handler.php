<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }
        
    //  if ($exception instanceof CustomException) {
    //      return abort(403, 'Unauthorized action.');
    //      return response()->view('errors.custom', [], 500);
    //   }
}
