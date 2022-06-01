<?php

namespace App\Http\Controllers\Api\Petani;

use App\Http\Controllers\Controller;
use App\Http\Resources\FarmerResource;
use App\Models\Farmer;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseApiController as BaseController;


class FarmerApiController extends BaseController
{
    public function index()
    {
        $datas = Farmer::latest()->get();
        $result = FarmerResource::collection($datas);
        return $this->sendResponse($result, 'Data fetched');
    }
}
