<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kutia\Larafirebase\Facades\Larafirebase;
use App\Http\Controllers\Api\BaseApiController as BaseController;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\User;

class ProductCustomerApiController extends BaseController
{
    public function index()
    {
        $datas = Product::latest()->get();

        $result = ProductResource::collection($datas);
        return $this->sendResponse($result, 'Data fetched');
    }

    public function sendnofit()
    {
        try {
            $fcmTokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();

            //Notification::send(null,new SendPushNotification($request->title,$request->message,$fcmTokens));

            /* or */

            //auth()->user()->notify(new SendPushNotification($title,$message,$fcmTokens));

            /* or */

            Larafirebase::withTitle("tes 1")
                ->withBody("tes 1 body")
                ->sendMessage($fcmTokens);
        } catch (\Exception $e) {
        }
    }
}
