<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\PhotoProduct;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Chat;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
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

            $chats = Chat::all();

            // $photoProduct = PhotoProduct::where('product_id', $product->id)->get();
            return view('pages.home.detail', compact('product', 'product_new', 'reviews', 'ratingValue', 'showReviews', 'chats'));
        } else {
            return redirect('/')->with('status', 'Produk tidak ditemukan');
        }
    }

    public function countCart()
    {
        if (Auth::user()) {
            $countCart = Cart::where('user_id', auth()->user()->id)->count();
        } elseif (Auth::guest()) {
            $countCart = 0;
        }
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

    public function searchAllProduct(Request $request)
    {
        if($request->max_price == 'max_price')
        {
            $product_new = Product::with('photo_product')
                        ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                        ->join('users', 'products.user_id', '=', 'users.id')
                        ->select('products.*', 'product_categories.name as category_name')
                        ->where('product_categories.is_active', '=', 1)
                        ->where('products.is_active', '=', 1)
                        ->filter(request(['pencarian']))
                        ->orderBy('products.price', 'desc')
                        ->get();
        }
        else if ($request->min_price == 'min_price')
        {
            $product_new = Product::with('photo_product')
                        ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                        ->join('users', 'products.user_id', '=', 'users.id')
                        ->select('products.*', 'product_categories.name as category_name')
                        ->where('product_categories.is_active', '=', 1)
                        ->where('products.is_active', '=', 1)
                        ->filter(request(['pencarian']))
                        ->orderBy('products.price', 'asc')
                        ->get();
        }
        else
        {
            $product_new = Product::with('photo_product')
                        ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                        ->join('users', 'products.user_id', '=', 'users.id')
                        ->select('products.*', 'product_categories.name as category_name')
                        ->where('product_categories.is_active', '=', 1)
                        ->where('products.is_active', '=', 1)
                        ->filter(request(['pencarian']))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();
        }
        return view('pages.home.search_product', compact('product_new'));
    }

    public function newProduct()
    {
        return view('pages.home.product_new');
    }

    public function fetchAllNewProduct(Request $request)
    {
        if($request->max_price == 'max_price')
        {
            $product_new = Product::with('photo_product')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.price', 'desc')
                    ->get();
        }
        else if ($request->min_price == 'min_price')
        {
            $product_new = Product::with('photo_product')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.price', 'asc')
                    ->get();
        }
        else
        {
		    $product_new = Product::with('photo_product')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.updated_at', 'desc')
                    ->get();
        }
		$output = '';
		if ($product_new->count() > 0) {
			foreach ($product_new as $item) {
				$output .= '
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product" style="height: 24.5rem">
                        <div class="product-image">
                            <a href="home/'.$item->slug.'">';
                                if ($item->photo_product->count() > 0) {
                                    foreach ($item->photo_product->take(1) as $photos) {
                                        if ($photos->name) {
                                        $output .= '<img src="../storage/produk/'.$photos->name.'" alt="'. $item->name .'"
                                            style="width: 27rem; height: 12rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">';
                                        } else {
                                        $output .= '<img src="img/no-image.png" alt="'. $item->name .'"
                                            style="width: 27rem; height: 12rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">';
                                        }
                                    }
                                } else {
                                $output .= '<img src="img/no-image.png" alt="'. $item->name .'"
                                    style="width: 27rem; height: 12rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">';
                                }
                            $output .= '</a>
                        </div>
                        <div class="product-info">
                            <a href="product-category/'.$item->product_category->slug.'">
                                <span class="category">'. $item->category_name .'</span>
                            </a>
                            <h4 class="title">
                                <a href="home/'.$item->slug.'"
                                    style="color:#16A085; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">'. $item->name .'</a>
                            </h4>
                            <ul class="review">
                                <div>';
                                    if ($item->stock_out) {
                                        $output .= '<span>'.$item->stock_out.' Terjual</span>';
                                    } else {
                                        $output .= '<span>0 Terjual</span>';
                                    }
                                $output .= '</div>';
                                $reviews = Review::where('product_id', $item->id)->get();
                                $ratingSum = Review::where('product_id', $item->id)->sum('stars_rated');
                                if ($reviews->count() > 0) {
                                    $ratingValue = $ratingSum / $reviews->count();
                                } else {
                                    $ratingValue = 0;
                                }
                                $rateNum = number_format($ratingValue);
                                for ($i = 1; $i <= $rateNum; $i++) {
                                    $output .= '<li><i class="lni lni-star-filled"></i></li>';
                                }
                                for ($j = $rateNum+1; $j <= 5; $j++) {
                                    $output .= '<li><i class="lni lni-star"></i></li>';
                                }
                            $output .= '</ul>
                            <div class="price">
                                <span>Rp. '. number_format($item->price, 0) .'</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                ';
			}
			echo $output;
		} else {
            if (request('pencarian')) {
                echo '<div id="app">
                    <section class="section">
                        <div class="container">
                            <div class="page-error">
                                <div class="page-inner">
                                    <img src="img/undraw_empty_re_opql.svg" alt="">
                                    <div class="page-description">
                                        Produk yang anda cari tidak ada!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>';
            } else {
                echo '<div id="app">
                    <section class="section">
                        <div class="container">
                            <div class="page-error">
                                <div class="page-inner">
                                    <img src="img/undraw_empty_re_opql.svg" alt="">
                                    <div class="page-description">
                                        Tidak ada produk yang diposting!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>';
            }
		}
	}

    public function basedSearch()
    {
        return view('pages.home.product_search');
    }

    public function fetchAllBasedSearch(Request $request)
    {
        if($request->max_price == 'max_price')
        {
            $based_search = Product::with('photo_product')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.price', 'desc')
                    ->orderByRaw('RAND()')
                    ->get();
        }
        else if ($request->min_price == 'min_price')
        {
            $based_search = Product::with('photo_product')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.price', 'asc')
                    ->orderByRaw('RAND()')
                    ->get();
        }
        else
        {
		    $based_search = Product::with('photo_product')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.updated_at', 'desc')
                    ->orderByRaw('RAND()')
                    ->get();
        }
		$output = '';
		if ($based_search->count() > 0) {
			foreach ($based_search as $item) {
				$output .= '
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product" style="height: 24.5rem">
                        <div class="product-image">
                            <a href="home/'.$item->slug.'">';
                                if ($item->photo_product->count() > 0) {
                                    foreach ($item->photo_product->take(1) as $photos) {
                                        if ($photos->name) {
                                        $output .= '<img src="../storage/produk/'.$photos->name.'" alt="'. $item->name .'"
                                            style="width: 27rem; height: 12rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">';
                                        } else {
                                        $output .= '<img src="img/no-image.png" alt="'. $item->name .'"
                                            style="width: 27rem; height: 12rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">';
                                        }
                                    }
                                } else {
                                $output .= '<img src="img/no-image.png" alt="'. $item->name .'"
                                    style="width: 27rem; height: 12rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">';
                                }
                            $output .= '</a>
                        </div>
                        <div class="product-info">
                            <a href="product-category/'.$item->product_category->slug.'">
                                <span class="category">'. $item->category_name .'</span>
                            </a>
                            <h4 class="title">
                                <a href="home/'.$item->slug.'"
                                    style="color:#16A085; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">'. $item->name .'</a>
                            </h4>
                            <ul class="review">
                                <div>';
                                    if ($item->stock_out) {
                                        $output .= '<span>'.$item->stock_out.' Terjual</span>';
                                    } else {
                                        $output .= '<span>0 Terjual</span>';
                                    }
                                $output .= '</div>';
                                $reviews = Review::where('product_id', $item->id)->get();
                                $ratingSum = Review::where('product_id', $item->id)->sum('stars_rated');
                                if ($reviews->count() > 0) {
                                    $ratingValue = $ratingSum / $reviews->count();
                                } else {
                                    $ratingValue = 0;
                                }
                                $rateNum = number_format($ratingValue);
                                for ($i = 1; $i <= $rateNum; $i++) {
                                    $output .= '<li><i class="lni lni-star-filled"></i></li>';
                                }
                                for ($j = $rateNum+1; $j <= 5; $j++) {
                                    $output .= '<li><i class="lni lni-star"></i></li>';
                                }
                            $output .= '</ul>
                            <div class="price">
                                <span>Rp. '. number_format($item->price, 0) .'</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                ';
			}
			echo $output;
		} else {
            echo '<div id="app">
                <section class="section">
                    <div class="container">
                        <div class="page-error">
                            <div class="page-inner">
                                <img src="img/undraw_empty_re_opql.svg" alt="">
                                <div class="page-description">
                                    Tidak ada produk yang diposting!
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>';
		}
	}

    public function allCategory()
    {
        return view('pages.category.allCategory');
    }

    public function fetchallCategory(Request $request)
    {
        if($request->max_price == 'max_price')
        {
            $product_new = Product::with('photo_product')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.price', 'desc')
                    ->get();
        }
        else if ($request->min_price == 'min_price')
        {
            $product_new = Product::with('photo_product')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.price', 'asc')
                    ->get();
        }
        else
        {
		    $product_new = Product::with('photo_product')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.updated_at', 'desc')
                    ->get();
        }
		$output = '';
		if ($product_new->count() > 0) {
			foreach ($product_new as $item) {
				$output .= '
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product" style="height: 24.5rem">
                        <div class="product-image">
                            <a href="../home/'.$item->slug.'">';
                                if ($item->photo_product->count() > 0) {
                                    foreach ($item->photo_product->take(1) as $photos) {
                                        if ($photos->name) {
                                        $output .= '<img src="../storage/produk/'.$photos->name.'" alt="'. $item->name .'"
                                            style="width: 27rem; height: 12rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">';
                                        } else {
                                        $output .= '<img src="../img/no-image.png" alt="'. $item->name .'"
                                            style="width: 27rem; height: 12rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">';
                                        }
                                    }
                                } else {
                                $output .= '<img src="../img/no-image.png" alt="'. $item->name .'"
                                    style="width: 27rem; height: 12rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">';
                                }
                            $output .= '</a>
                        </div>
                        <div class="product-info">
                            <a href="../product-category/'.$item->product_category->slug.'">
                                <span class="category">'. $item->category_name .'</span>
                            </a>
                            <h4 class="title">
                                <a href="../home/'.$item->slug.'"
                                    style="color:#16A085; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; overflow: hidden;">'. $item->name .'</a>
                            </h4>
                            <ul class="review">
                                <div>';
                                    if ($item->stock_out) {
                                        $output .= '<span>'.$item->stock_out.' Terjual</span>';
                                    } else {
                                        $output .= '<span>0 Terjual</span>';
                                    }
                                $output .= '</div>';
                                $reviews = Review::where('product_id', $item->id)->get();
                                $ratingSum = Review::where('product_id', $item->id)->sum('stars_rated');
                                if ($reviews->count() > 0) {
                                    $ratingValue = $ratingSum / $reviews->count();
                                } else {
                                    $ratingValue = 0;
                                }
                                $rateNum = number_format($ratingValue);
                                for ($i = 1; $i <= $rateNum; $i++) {
                                    $output .= '<li><i class="lni lni-star-filled"></i></li>';
                                }
                                for ($j = $rateNum+1; $j <= 5; $j++) {
                                    $output .= '<li><i class="lni lni-star"></i></li>';
                                }
                            $output .= '</ul>
                            <div class="price">
                                <span>Rp. '. number_format($item->price, 0) .'</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                ';
			}
			echo $output;
		} else {
            echo '<div id="app">
                <section class="section">
                    <div class="container">
                        <div class="page-error">
                            <div class="page-inner">
                                <img src="img/undraw_empty_re_opql.svg" alt="">
                                <div class="page-description">
                                    Tidak ada produk yang diposting!
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>';
		}
	}

    public function viewCategory(Request $request, $slug)
    {
        if (ProductCategory::where('slug', $slug)->exists()) {
            $category_product = ProductCategory::where('slug', $slug)->first();
            if($request->max_price == 'max_price')
            {
                $product = Product::with('photo_product')
                        ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                        ->join('users', 'products.user_id', '=', 'users.id')
                        ->select('products.*', 'product_categories.name as category_name')
                        ->where('category_product_id', $category_product->id)
                        ->where('product_categories.is_active', '=', 1)
                        ->where('products.is_active', '=', 1)
                        ->orderBy('products.price', 'desc')
                        ->get();
            }
            else if ($request->min_price == 'min_price')
            {
                $product = Product::with('photo_product')
                        ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                        ->join('users', 'products.user_id', '=', 'users.id')
                        ->select('products.*', 'product_categories.name as category_name')
                        ->where('category_product_id', $category_product->id)
                        ->where('product_categories.is_active', '=', 1)
                        ->where('products.is_active', '=', 1)
                        ->orderBy('products.price', 'asc')
                        ->get();
            }
            else
            {
                $product = Product::with('photo_product')
                        ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                        ->join('users', 'products.user_id', '=', 'users.id')
                        ->select('products.*', 'product_categories.name as category_name')
                        ->where('category_product_id', $category_product->id)
                        ->where('product_categories.is_active', '=', 1)
                        ->where('products.is_active', '=', 1)
                        ->orderBy('products.updated_at', 'desc')
                        ->get();
            }

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
                $showReviews = Review::where('product_id', $product->id)->get();
                $reviews = Review::where('product_id', $product->id)->get();
                $ratingSum = Review::where('product_id', $product->id)->sum('stars_rated');
                if ($reviews->count() > 0){
                    $ratingValue = $ratingSum / $reviews->count();
                } else {
                    $ratingValue = 0;
                }
                $chats = Chat::all();
                return view('pages.home.detail', compact('product', 'product_new', 'reviews', 'ratingValue', 'showReviews', 'chats'));
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
