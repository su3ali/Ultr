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

    }

    public function allType(): JsonResponse
    {
        $complaint_type = ComplaintType::latest()->get();

        $this->body['type'] = TypesResource::collection($complaint_type);

        return self::apiResponse(200, null, $this->body);
    }

}
