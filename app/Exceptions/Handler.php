<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            // Customize reporting logic if needed
        });
    }

    public function render($request, Throwable $exception)
    {
        $status = $this->getStatusCode($exception);

        if ($request->expectsJson()) {
            // Handle API requests with JSON response
            return $this->renderApiException($exception, $status);
        }

        // Handle web/dashboard requests with views
        return $this->renderWebException($exception, $status);
    }

    /**
     * Render an API exception response.
     *
     * @param Throwable $exception
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    protected function renderApiException(Throwable $exception, int $status)
    {
        return response()->json([
            'status' => false,
            'code' => $status,
            'message' => $this->getMessageForException($exception),
            'data' => null, // Optionally include additional data
        ], $status);
    }

    /**
     * Render a web/dashboard exception response.
     *
     * @param Throwable $exception
     * @param int $status
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderWebException(Throwable $exception, int $status)
    {
        if (view()->exists("errors.{$status}")) {
            return response()->view("errors.{$status}", ['exception' => $exception], $status);
        }

        // Fallback to a default error view
        return response()->view('errors.500', ['exception' => $exception], 500);
    }

    /**
     * Get the HTTP status code for the exception.
     *
     * @param Throwable $exception
     * @return int
     */
    protected function getStatusCode(Throwable $exception): int
    {
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
            return $exception->getStatusCode();
        }

        return Response::HTTP_INTERNAL_SERVER_ERROR;
    }

    /**
     * Get a user-friendly message for the exception.
     *
     * @param Throwable $exception
     * @return string
     */
    protected function getMessageForException(Throwable $exception): string
    {
        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            return 'Validation failed. Please check your input.';
        }

        if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
            return 'Authentication is required.';
        }

        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            return 'The requested resource could not be found.';
        }

        return $exception->getMessage() ?: 'An unexpected error occurred.';
    }
}
