<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\PhotoProduct;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;

class ProductController extends Controller
{
    public function index()
    {
        $category_product = ProductCategory::where('is_active', '=', 1)->latest()->get();
        $product_new = Product::with('photo_product', 'review')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.updated_at', 'desc')
                    ->take(8)
                    ->get();
        $product_search = Product::with('photo_product', 'review', 'orderItems')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.updated_at', 'desc')
                    ->orderByRaw('RAND()')
                    ->take(8)
                    ->get();
        return view('pages.home.index', compact('category_product', 'product_new', 'product_search'));
    }

    public function detailProduct($slug)
    {
        if (Product::where('slug', $slug)->exists()) {
            $product = Product::with('photo_product')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('products.slug', $slug)
                    ->orderBy('products.updated_at', 'desc')
                    ->first();

            $product_new = Product::with('photo_product', 'review')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.updated_at', 'desc')
                    ->get();

            $showReviews = Review::where('product_id', $product->id)->get();
            $reviews = Review::where('product_id', $product->id)->get();
            $ratingSum = Review::where('product_id', $product->id)->sum('stars_rated');
            if ($reviews->count() > 0){
                $ratingValue = $ratingSum / $reviews->count();
            } else {
                $ratingValue = 0;
            }

            // $photoProduct = PhotoProduct::where('product_id', $product->id)->get();
            return view('pages.home.detail', compact('product', 'product_new', 'reviews', 'ratingValue', 'showReviews'));
        } else {
            return redirect('/')->with('status', 'Produk tidak ditemukan');
        }
    }

    public function countCart()
    {
        $countCart = Cart::where('user_id', auth()->user()->id)->count();
        return response()->json(['count'=> $countCart]);
    }

    public function cartIncrement($id)
    {
        $cartItem = Cart::with('product')->where('id', $id)->latest()->get();
        foreach ($cartItem as $cartItem) {
            Cart::with('product')->where('id', $id)->update([
                'product_qty' => $cartItem->product_qty + 1,
            ]);
        }
        return response()->json();
    }

    public function cartDecrement($id)
    {
        $cartItem = Cart::with('product')->where('id', $id)->latest()->get();
        foreach ($cartItem as $cartItem) {
            Cart::with('product')->where('id', $id)->update([
                'product_qty' => $cartItem->product_qty - 1,
            ]);
        }
        return response()->json();
    }

    public function newProduct()
    {
        $product_new = Product::with('photo_product')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.updated_at', 'desc')
                    ->filter(request(['pencarian']))
                    ->get();
        return view('pages.home.product_new', compact('product_new'));
    }

    public function basedSearch()
    {
        $product_new = Product::with('photo_product')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.updated_at', 'desc')
                    ->orderByRaw('RAND()')
                    ->get();
        return view('pages.home.product_search', compact('product_new'));
    }

    public function allCategory()
    {
        $product_new = Product::with('photo_product')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.updated_at', 'desc')
                    ->get();
        return view('pages.category.allCategory', compact('product_new'));
    }

    public function viewCategory($slug)
    {
        if (ProductCategory::where('slug', $slug)->exists()) {
            $category_product = ProductCategory::where('slug', $slug)->first();
            $product = Product::with('photo_product')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('category_product_id', $category_product->id)
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.updated_at', 'desc')
                    ->get();

            return view('pages.category.index', compact('category_product', 'product'));
        } else {
            return redirect('/')->with('status', 'Kategori Produk tidak ditemukan');
        }
    }

    public function productView($category_slug, $product_slug)
    {
        if (ProductCategory::where('slug', $category_slug)->exists()) {
            if (Product::where('slug', $product_slug)->exists()) {
                $product = Product::where('slug', $product_slug)->first();
                $product_new = Product::with('photo_product', 'review')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.updated_at', 'desc')
                    ->get();
                $reviews = Review::where('product_id', $product->id)->get();
                $ratingSum = Review::where('product_id', $product->id)->sum('stars_rated');
                if ($reviews->count() > 0){
                    $ratingValue = $ratingSum / $reviews->count();
                } else {
                    $ratingValue = 0;
                }
                return view('pages.home.detail', compact('product', 'product_new', 'reviews', 'ratingValue'));
            } else {
                return redirect('/')->with('status', 'The link was broken!');
            }

        } else {
            return redirect('/')->with('status', 'No such category found!');
        }
    }

    // public function productListAjax()
    // {
    //     $product = Product::select('name')->where('is_active', '1')->get();
    //     $data = [];

    //     foreach ($product as $item) {
    //         $data[] = $item['name'];
    //     }

    //     return $data;
    // }

    public function productListAjax(Request $request)
    {
        return Product::select('name')
        ->where('is_active', '1')
        ->where('name', 'like', "%{$request->term}%")
        ->pluck('name');
    }

    // public function searchProduct(Request $request)
    // {
    //     $searched_product = $request->product_name;

    //     if ($searched_product != "")
    //     {
    //         $product = Product::where('name', 'like', "%{$searched_product}%")->first();
    //         if ($product)
    //         {
    //             return redirect('product-category/'.$product->product_category->slug.'/'.$product->slug);
    //         } else
    //         {
    //             return redirect()->back()->with('status', 'Produk yang anda cari tidak ada!');
    //         }
    //     } else
    //     {
    //         return redirect()->back();
    //     }

    // }
}
