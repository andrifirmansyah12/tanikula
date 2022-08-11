<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseApiController as BaseController;
use App\Models\Order;

class TransactionListApiController extends BaseController
{
    public function index($user_id)
    {
        $datas = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->join('addresses', 'orders.address_id', '=', 'addresses.id')
            ->select('orders.*', 'addresses.recipients_name as name_billing')
            ->where('orders.user_id', '=', $user_id)
            ->orderBy('orders.created_at', 'desc')
            ->get();
        // $result = ChatResource::collection($datas);
        return $this->sendResponse($datas, 'Data fetched');
    }

    public function detailPesanan($id, Request $request)
    {
        $user_id = $request->user_id;
        $checkOrder = Order::with('address', 'user', 'orderItems')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('addresses', 'orders.address_id', '=', 'addresses.id')
            ->select('orders.*', 'addresses.recipients_name as name_billing')
            ->where('orders.user_id', '=', $user_id)
            ->where('orders.id', '=', $id)
            ->exists();

        if ($checkOrder) {
            $order = Order::with('address', 'user', 'orderItems')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->join('addresses', 'orders.address_id', '=', 'addresses.id')
                ->select('orders.*', 'addresses.recipients_name as name_billing')
                ->where('orders.user_id', '=', $user_id)
                // ->where('orders.id', '=', $id)
                ->find($id);

            return $this->sendResponse($order, 'Data fetched');
            // return $order;
        } else {
            return "nothing";
        }
    }
}
