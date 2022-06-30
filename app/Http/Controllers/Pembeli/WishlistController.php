<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Costumer;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $data = ['userInfo' => Costumer::with('user')
            ->where('user_id', '=', auth()->user()->id)
            ->first()
        ];

        $data2 = ['wishlist' => Wishlist::with('user', 'product')
            ->where('user_id', '=', auth()->user()->id)
            ->get()
        ];

        return view('costumer.favorite.index', $data, $data2);
    }

    public function addToWishlist(Request $request)
    {
        $product_id = $request->input('product_id');

        if(Auth::check() && Auth()->user()->hasRole('pembeli')) {

            $prod_check = Product::where('id', $product_id)->first();
            if ($prod_check) {
                if (Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => "Produk sudah ditambahkan ke Wishlist!"]);
                } else {
                    $wishlist = new Wishlist();
                    $wishlist->user_id = Auth::id();
                    $wishlist->product_id = $product_id;
                    $wishlist->save();
                    return response()->json(['status' => "Ditambahkan ke Wishlist"]);
                }
            }
        } else {
            return response()->json(['status' => "Silahkan login!"]);
        }
    }

    public function deleteWishlistItem(Request $request)
    {
        if(Auth::check() && Auth()->user()->hasRole('pembeli')) {
            $product_id = $request->input('product_id');
            if (Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                $wishlist = Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $wishlist->delete();
                return response()->json(['status' => "Produk berhasil dihapus dari Wishlist!"]);
            }
        } else {
            return response()->json(['status' => "Silahkan login!"]);
        }
    }
}
