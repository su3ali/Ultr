<?php
namespace App\Http\Controllers\Api\ComplaintType;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cars\TypesResource;
use App\Models\ComplaintType;
use App\Support\Api\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class ComplaintTypeController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
        $this->middleware('localization');
        $this->middleware('auth:sanctum'); // Apply auth middleware globally to this controller

    }

    public function allType(): JsonResponse
    {
        // Check if the user is authenticated
        if (! auth('sanctum')->check()) {
            // Return 401 Unauthorized with a custom message if not authenticated
            return response()->json([
                'message' => 'Unauthorized. Please authenticate to access this resource.',
            ], 401);
        }

        // Fetch complaint types
        $complaint_type = ComplaintType::latest()->get();

        // Prepare response data
        $this->body['type'] = TypesResource::collection($complaint_type);

        // Return response
        return self::apiResponse(200, null, $this->body);
    }

}
