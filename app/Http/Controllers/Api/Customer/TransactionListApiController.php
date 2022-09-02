<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseApiController as BaseController;
use App\Http\Resources\DetailTranssactionResource;
use App\Http\Resources\RiwayatPemesananResource;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use App\Models\Product;

class TransactionListApiController extends BaseController
{
    public function index($user_id)
    {
        $datas = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->join('addresses', 'orders.address_id', '=', 'addresses.id')
            ->select('orders.*', 'addresses.recipients_name as name_billing')
            ->where('orders.user_id', '=', $user_id)
            ->orderBy('orders.created_at', 'desc')
            // ->paginate(3);
            ->get();
        $result = RiwayatPemesananResource::collection($datas);
        return $this->sendResponse($result, 'Data fetched');
        // return $this->sendResponse($datas, 'Data fetched');
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

            $result = DetailTranssactionResource::make($order);
            // return $this->sendResponse($order, 'Data fetched');
            return $this->sendResponse($result, 'Data fetched');
            // return $order;
        } else {
            return $this->sendResponse([], 'Data fetched');
        }
    }

    public function orderCompleted(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Required
        ], [
            // Validator
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $orders = Order::find($request->id);
            $orders->status = Order::COMPLETED;
            $orders->update();

            // mengurangi stock
            $orderItem = OrderItem::where('id', $orders->id)->get();
            foreach ($orderItem as $key => $value) {
                $produk = Product::where('id', $value->product_id)->first();
                $produk->stoke = $produk->stoke - $value->qty;
                // if ($prod->stock_out == null) {
                //     $prod->stock_out = $item->product_qty;
                // } else {
                $produk->stock_out = $produk->stock_out + $value->qty;
                // }
                $produk->update();
            }

            return response()->json([
                'status' => 200,
            ]);
        }
    }

    public function cancelOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Required
        ], [
            // Validator
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $orders = Order::find($request->id);
            $orders->status = Order::CANCELLED;
            $orders->cancelled_by = $request->user_id;
            $orders->cancelled_at = Carbon::now()->format('Y-m-d H:i:s');
            $orders->cancellation_note = $request->cancellation_note;
            $orders->update();

            return response()->json([
                'status' => 200,
            ]);
        }
    }
}
