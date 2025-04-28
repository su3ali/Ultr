<?php
namespace App\Support\Api;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    public static function apiResponse(
        int $code = 200,
        string | null $message = null,
        mixed $body = [],
        mixed $strings = null,
        string $info = 'OK'
    ): JsonResponse {
        return response()->json([
            'success' => $code >= 200 && $code < 300,
            'code'    => $code,
            'message' => $message ?? self::defaultMessageForCode($code),
            'data'    => $body,
            'strings' => $strings,
            'info'    => $info,
        ], $code);
    }

    protected static function defaultMessageForCode(int $code): string
    {
        return match ($code) {
            200 => 'Success',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            404 => 'Not Found',
            500 => 'Server Error',
            default => 'Unknown status',
        };
    }
}
