<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseApiController as BaseController;
use App\Models\Order;
use App\Models\Review;
use Carbon\Carbon;

class ReviewApiController extends BaseController
{
    // public function index()
    // {
    //     $datas = Review::latest()->get();

    //     return $this->sendResponse($datas, 'Data fetched');
    // }

    public function store(Request $request)
    {

        $datas = Review::create([
            "product_id" => $request->product_id,
            "user_id" =>   $request->user_id,
            "order_id" => $request->order_id,
            "stars_rated" => $request->stars_rated,
            "review" => $request->review,
        ]);

        // $result = Review::make($datas);
        return $this->sendResponse($datas, 'Data fetched');

        // $user_id =  $request->user_id;
        // $order_id =  $request->input('order_id', []);
        // $product_id =  $request->input('product_id', []);
        // $stars_rated =  $request->input('stars_rated', []);
        // $review =  $request->input('review', []);
        // $units = [];
        // foreach ($stars_rated as $index => $unit) {
        //     $units[] = [
        //         "product_id" => $product_id[$index],
        //         "user_id" => $user_id,
        //         "order_id" => $order_id[$index],
        //         "stars_rated" => $stars_rated[$index],
        //         "review" => $review[$index],
        //     ];
        // }

        // Review::insert($units);


        // $orders = Order::where('id', $request->input('rev_order_id'))->first();
        // $orders->review = Order::REVIEWED;
        // $orders->update();

        // return $this->sendResponse($units, 'Data fetched');
    }

    // handle insert a new employee ajax request
    public function addReview(Request $request)
    {
        $product_id =  $request->input('product_id', []);
        $order_id =  $request->input('order_id', []);
        $stars_rated =  $request->input('stars_rated', []);
        $review =  $request->input('review', []);
        $hide =  $request->input('hide') ? 1 : 0;
        $units = [];
        foreach ($stars_rated as $index => $unit) {
            $units[] = [
                "product_id" => $product_id[$index],
                "user_id" => $request->user_id,
                "order_id" => $order_id[$index],
                "stars_rated" => $stars_rated[$index],
                "review" => $review[$index],
                "hide" => $hide,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ];
        }

        Review::insert($units);

        $orders = Order::where('id', $order_id[0])->first();
        $orders->review = Order::REVIEWED;
        $orders->update();

        return response()->json([
            'status' => 200,
        ]);
    }
}
