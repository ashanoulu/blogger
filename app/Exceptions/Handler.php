<?php

namespace App\Exceptions;

use App\Libraries\ChannelLog as Log;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class Handler extends ExceptionHandler
{
    public $response_status_code = 200;
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
//        dd($exception);
        $message = $exception->getMessage();
//        Log::write('exception', 'Exception', ['=============================START=================================']);
//        Log::write('exception', 'Exception', ['Client IP'=>json_encode(request()->ip())]);
//        Log::write('exception', 'Exception', ['Route'=>json_encode(request()->route())]);
//        Log::write('exception', 'Exception', ['Headers'=>json_encode(request()->headers->all())]);
//        Log::write('exception', 'Exception', ['request'=>json_encode(request()->all())]);
//        Log::write('exception', 'Exception', ['request'=>$request->all()]);

//        if ($exception->getMessage() == 'You are not authorized to access this resource.') {
//            $message =  'You are not authorized to access this resource.';
//            $this->response_status_code = API_RES_STATUS_UNAUTHORIZED;
//        }
//
        if ($exception instanceof ValidationException)
        {
            $response['errors']['validations'] = $exception->errors();
            return response(['data'=>$response])->header('Content-Type', 'application/json');
        }
//
//        if ($exception instanceof ModelNotFoundException)
//        {
//            return response([],API_RES_STATUS_NO_CONTENT)->header('Content-Type', 'application/json');
//        }
//
//        if ($exception instanceof TokenInvalidException)
//        {
//            $this->response_status_code = API_RES_STATUS_INVALID_TOKEN;
//        }
//
//        if ($exception instanceof NotFoundHttpException)
//        {
//            $message = API_INVALID_URL_TEXT;
//            $this->response_status_code = API_RES_STATUS_NOT_FOUND_ERROR;
//        }
//
//        if ($exception instanceof MethodNotAllowedHttpException)
//        {
//            $this->response_status_code = API_RES_STATUS_METHOD_NOT_ALLOWED;
//            $message = API_RES_STATUS_METHOD_NOT_ALLOWED_TEXT;
//        }
//
//        if ($exception instanceof UnauthorizedHttpException )
//        {
//            $this->response_status_code = API_RES_STATUS_UNAUTHORIZED;
//        }
//
//        if ($exception instanceof QueryException)
//        {
//            $this->response_status_code = API_RES_STATUS_INTERNAL_SERVER_ERROR;
//            $message = API_INVALID_DB_REQUEST_TEXT;
//        }
//
//        /*if($exception->getStatusCode()){
//            $code = $exception->getStatusCode();
//        }else{*/
//        $code = '';
//        //}
//
//        Log::write('exception', 'Exception', ['Exception code'=>$code,'API response code'=> $this->response_status_code]);
//        Log::write('exception', 'Exception', ['Exception message'=>$message]);
//        Log::write('exception', 'Exception', ['==============================END==================================']);
        return response(['error'=>$message],$this->response_status_code)->header('Content-Type', 'application/json');
    }
}
