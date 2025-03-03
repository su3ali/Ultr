<?php
namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        // Handle specific HTTP exceptions
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
            $status = $exception->getStatusCode();

            // Render the appropriate error page if it exists
            if (view()->exists("errors.{$status}")) {
                return response()->view("errors.{$status}", [], $status);
            }

            // Fallback to a default error view
            return response()->view('errors.500', ['status' => $status], $status);
        }

        // Log the exception for debugging purposes
        \Log::error($exception->getMessage(), ['exception' => $exception]);

        // Default exception handling
        return parent::render($request, $exception);
    }

}
