<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
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
     */
    public function render($request, Throwable $exception)
    {
        // Handle API and Web separately
        if ($request->expectsJson()) {
            return $this->handleApiException($exception);
        }

        return $this->handleWebException($request, $exception);
    }

    /**
     * Handle API exceptions.
     *
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\JsonResponse
     */
    private function handleApiException(Throwable $exception)
    {
        // Handle validation exceptions
        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error occurred.',
                'errors' => $exception->errors(),
            ], 422);
        }

        // Handle HTTP exceptions
        if ($exception instanceof HttpException) {
            $status = $exception->getStatusCode();
            return response()->json([
                'status' => false,
                'message' => $this->getHttpExceptionMessage($exception),
            ], $status);
        }

        // Handle unexpected exceptions
        \Log::error($exception->getMessage(), ['exception' => $exception]);

        return response()->json([
            'status' => false,
            'message' => 'An unexpected error occurred. Please try again later.',
        ], 500);
    }

    /**
     * Handle web (dashboard) exceptions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function handleWebException($request, Throwable $exception)
    {
        if ($exception instanceof HttpException) {
            $status = $exception->getStatusCode();

            // Render a specific error page if it exists
            if (view()->exists("errors.{$status}")) {
                return response()->view("errors.{$status}", [], $status);
            }

            // Fallback to a default error page
            return response()->view('errors.500', ['message' => 'An error occurred.'], $status);
        }

        // Log unexpected exceptions
        \Log::error($exception->getMessage(), ['exception' => $exception]);

        // Fallback to default 500 error page
        return response()->view('errors.500', [
            'message' => 'An unexpected error occurred. Please try again later.',
        ], 500);
    }

    /**
     * Get custom error messages for specific HTTP exceptions.
     *
     * @param  \Symfony\Component\HttpKernel\Exception\HttpException  $exception
     * @return string
     */
    private function getHttpExceptionMessage(HttpException $exception)
    {
        $status = $exception->getStatusCode();

        return match ($status) {
            404 => 'The requested resource was not found.',
            403 => 'You do not have permission to access this resource.',
            401 => 'Authentication is required to access this resource.',
            429 => 'Too many requests. Please try again later.',
            default => 'An error occurred.',
        };
    }
}
