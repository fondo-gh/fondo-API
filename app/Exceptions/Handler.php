<?php

namespace App\Exceptions;

use App\Traits\ApiBaseController;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{

    use ApiBaseController;

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
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        //check if is api call, if true, render json response, else render html view error page
        if ($this->isApiCall()) {
            if ($exception instanceof ModelNotFoundException) {
                return $this->sendErrorResponse($exception->getMessage(), 404);
            } elseif ($exception instanceof MethodNotAllowedHttpException) {
                return $this->sendErrorResponse($exception->getMessage(), $exception->getStatusCode());
            } elseif ($exception instanceof AuthenticationException) {
                return $this->sendErrorResponse($exception->getMessage(), 401);
            } elseif ($exception instanceof AuthorizationException) {
                return $this->sendErrorResponse($exception->getMessage(), 403);
            } else {
                return $this->sendErrorResponse($exception->getMessage(), 500);
            }
        }
        return parent::render($request, $exception);
    }

    /**
     * Checks the current url to check if it contains 'api'
     * @return boolean
     */
    private function isApiCall()
    {
        return preg_match('/api/', url()->current());
    }
}
