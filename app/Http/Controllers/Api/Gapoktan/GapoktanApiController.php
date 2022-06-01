<?php

namespace App\Http\Controllers\Api\Gapoktan;

use App\Models\Gapoktan;
use App\Http\Controllers\Api\BaseApiController as BaseController;
use App\Http\Resources\GapoktanResource;

class GapoktanApiController extends BaseController
{
    public function index()
    {
        $datas = Gapoktan::latest()->get();
        $result = GapoktanResource::collection($datas);
        return $this->sendResponse($result, 'Data fetched');
    }
}
