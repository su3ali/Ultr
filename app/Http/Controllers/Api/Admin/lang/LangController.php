<?php

namespace App\Http\Controllers\Api\Admin\lang;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\lang\LangResource;
use App\Models\Language;
use App\Support\Api\ApiResponse;

class LangController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
        $this->middleware('localization');
    }

    protected function getLang()
    {
        $langs = Language::where('active',1)->get();
        $this->body['lang'] = LangResource::collection($langs);
        return self::apiResponse(200, null, $this->body);
    }



}
