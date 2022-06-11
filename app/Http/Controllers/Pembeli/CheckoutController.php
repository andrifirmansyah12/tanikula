<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartItem = Cart::with('product')->where('user_id', Auth::id())->latest()->get();
        foreach ($old_cartItem as $item) {
            if (!Product::where('id', $item->product_id)->where('stoke', '>=', $item->product_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $item->product_id)->first();
                $removeItem->delete();
            }
        }
        $cartItem = Cart::with('product')->where('user_id', Auth::id())->latest()->get();
        return view('pages.checkout.index', compact('cartItem'));
    }
}
