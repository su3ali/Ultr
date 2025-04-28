<?php
namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Log;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'message' => 'Unauthenticated.',
            ], 401);
        }

        return redirect()->guest(route('login'));
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AuthenticationException) {
            return $this->unauthenticated($request, $exception);
        }

        if ($request->expectsJson() || $request->is('api/*')) {
            if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
                return response()->json([
                    'message' => 'Not Found.',
                ], 404);
            }

            if ($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
                return response()->json([
                    'message' => 'Method Not Allowed.',
                ], 405);
            }

            if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
                return response()->json([
                    'message' => $exception->getMessage() ?: 'HTTP Error',
                ], $exception->getStatusCode());
            }

            return response()->json([
                'message' => 'Server Error.',
                'error'   => config('app.debug') ? $exception->getMessage() : null,
            ], 500);
        }

        // Web request
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
            $status = $exception->getStatusCode();

            if (view()->exists("errors.{$status}")) {
                return response()->view("errors.{$status}", [], $status);
            }

            return response()->view('errors.500', ['status' => $status], $status);
        }

        Log::error($exception->getMessage(), ['exception' => $exception]);

        return parent::render($request, $exception);
    }
}
