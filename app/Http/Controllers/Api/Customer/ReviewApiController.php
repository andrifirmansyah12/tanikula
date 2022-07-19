<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseApiController as BaseController;
use App\Models\Review;

class ReviewApiController extends BaseController
{
    public function indexByid($user_id)
    {
        $datas = Review::where('user_id', $user_id)->latest()->get();

        return $this->sendResponse($datas, 'Data fetched');
    }

    public function store(Request $request)
    {

        $datas = Review::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'product_qty' => $request->product_qty,
            'session_id' => $request->session_id,

        ]);

        $result = CartResource::make($datas);
        return $this->sendResponse($result, 'Data fetched');
    }
}
