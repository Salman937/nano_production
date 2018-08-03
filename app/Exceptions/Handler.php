<?php

namespace App\Exceptions;

use Exception;
use Request;
use Illuminate\Auth\AuthenticationException;
use Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
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
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }
    /**
     * Convert an authentication exception into a response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // if ($request->expectsJson()) {
        //     return response()->json(['error' => 'Unauthenticated.'], 401);
        // }
        if ($request->expectsJson()) {
            \Log::warning('Unauthorized access, api_token mis match for ' . $request->api_token);
            return response()->json([
                'success' => true,
                'response_code' => 401,
                'message' => "Unauthorized token",
                'errors' => [
                    'api_token' => [
                        "Either the API token is missing or is invalid. please try again with a valid api token"
                    ]
                ]
            ], 401);
        }

        return redirect()->guest(route('login'));

        // return response()->json([
        //         'success' => false,
        //         'response_code' => 401,
        //         'message' => "Unauthorized token",
        //         'errors' => [
        //             'api_token' => [
        //                 "Either the API token is missing or is invalid. please try again with a valid api token"
        //             ]
        //         ]
        //     ], 401);
    }
}
