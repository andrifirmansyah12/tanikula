<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseApiController as BaseController;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductCustomerApiController extends BaseController
{
    public function index()
    {
        $datas = Product::latest()->get();

        $result = ProductResource::collection($datas);
        return $this->sendResponse($result, 'Data fetched');
    }
}
