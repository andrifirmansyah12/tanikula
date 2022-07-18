<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\BaseApiController as BaseController;



class CheckoutApiController extends BaseController
{
    public function placeOrder(Request $request)
    {
        $order = new Order();
        $order->user_id = $request->user_id; //

        $address = Address::with('user')
            ->join('users', 'addresses.user_id', '=', 'users.id')
            ->select('addresses.*', 'users.email as email')
            ->where('user_id', $request->user_id)
            ->where('addresses.main_address', 1)
            ->orderBy('addresses.updated_at', 'desc')
            ->take(1)
            ->get();
        foreach ($address as $address) {
            $order->address_id = $address->id; // alamat checkout
        }

        $total = 0; // total item checkout
        $cartItem_total = Cart::with('product')->where('user_id', $request->user_id)->latest()->get();
        foreach ($cartItem_total as $product_total) {
            $total += $product_total->product->price * $product_total->product_qty;
        }

        $orderDate = date('Y-m-d H:i:s');
        $paymentDue = (new \DateTime($orderDate))->modify('+1 day')->format('Y-m-d H:i:s');

        $order->total_price = $total;
        $order->code = Order::generateCode();
        $order->status = Order::CREATED;
        $order->order_date = $orderDate;
        $order->payment_due = $paymentDue;
        $order->payment_status = Order::UNPAID;
        $order->save();

        $cartItem = Cart::with('product')->where('user_id', $request->user_id)->latest()->get();
        foreach ($cartItem as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'qty' => $item->product_qty,
                'price' => $item->product->price,
            ]);

            $prod = Product::where('id', $item->product_id)->first();
            $prod->stoke = $prod->stoke - $item->product_qty;
            if ($prod->stock_out == null) {
                $prod->stock_out = $item->product_qty;
            } else {
                $prod->stock_out = $prod->stock_out + $item->product_qty;
            }
            $prod->update();
        }

        $this->initPaymentGateway();

        $customerDetails = [
            'first_name' => $address->recipients_name,
            'email' => $address->user->email,
            'phone' => $address->telp,
        ];

        $params = [
            'enable_payments' => \App\Models\Payment::PAYMENT_CHANNELS,
            'transaction_details' => [
                'order_id' => $order->code,
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => $customerDetails,
            'expiry' => [
                'start_time' => date('Y-m-d H:i:s T'),
                'unit' => \App\Models\Payment::EXPIRY_UNIT,
                'duration' => \App\Models\Payment::EXPIRY_DURATION,
            ],
        ];

        $snap = \Midtrans\Snap::createTransaction($params);

        if ($snap->token) {
            $order->payment_token = $snap->token;
            $order->payment_url = $snap->redirect_url;
            $order->save();
        }

        if ($order) {
            $cartItem = Cart::with('product')->where('user_id', $request->user_id)->latest()->get();
            Cart::destroy($cartItem);

            // \Session::flash('success', 'Thank you. Your order has been received!');
            // return redirect('cart/shipment/place-order/received/'. $order->id);

            $checkOrder = Order::with('address', 'user', 'orderItems')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->join('addresses', 'orders.address_id', '=', 'addresses.id')
                ->select('orders.*', 'addresses.recipients_name as name_billing')
                ->where('orders.user_id', '=', $request->user_id)
                ->where('orders.payment_status', '=', 'unpaid')
                ->where('orders.status', '=', 'created')
                ->where('orders.id', '=', $order->id)
                ->exists();
            if ($checkOrder) {
                $order = Order::with('address', 'user', 'orderItems')
                    ->where('id', $order->id)
                    ->where('user_id', $request->user_id)
                    ->firstOrFail();

                // return view('pages.order.index', compact('order'));
                // return $order;
                //   $result = CartResource::make($datas);
                return $this->sendResponse($order, 'Data fetched');
            } else {
                return "redirect('/')";
            }
        }

        // return redirect('cart/shipment');
        return "redirect('cart/shipment')";
    }

    private function initPaymentGateway()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }
}
