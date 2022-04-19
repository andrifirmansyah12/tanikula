<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseApiController as BaseController;


class ProductApiController extends BaseController
{
    public function index()
    {
        $datas = Product::latest()->get();

        $result = ProductResource::collection($datas);
        return $this->sendResponse($result, 'Data fetched');
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($slug)
    {
        $product = Product::where('slug',$slug)->firstOrfail();
        return $this->sendResponse($product, 'Data fetched');
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
