<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Costumer;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Review;
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
            ->latest()
            ->count()
        ];

        return view('costumer.favorite.index', $data, $data2);
    }

    public function fetchAllWishlist(Request $request)
    {
        $wishlist = Wishlist::with('user', 'product')
                ->where('user_id', '=', auth()->user()->id)
                ->latest()
                ->get();
		$output = '';
		if ($wishlist->count() > 0) {
			foreach ($wishlist as $item) {
                if ($item->product->stoke === 0) {
                    $output .= '
                    <div class="col-xl-3 col-md-6 mb-xl-0 mt-3" id="product_data">
                        <div class="card card-blog border rounded bg-white shadow card-plain bg-light opacity-90"
                            style="height: 26rem">
                            <div class="bg-light opacity-90">
                                <a href="'. url('home/' . $item->product->slug) .'">';
                                    if ($item->product->stoke === 0) {
                                        $output .= '<div style="z-index: 3"
                                            class="badge bg-danger px-3 position-absolute top-30 start-50 translate-middle">
                                            <h5 class="text-white m-0">Stok Habis</h5>
                                        </div>';
                                    }
                                    if ($item->product->photo_product->count() > 0) {
                                        foreach ($item->product->photo_product->take(1) as $photos) {
                                            if ($photos->name) {
                                                $output .= '<img src="'. asset('../storage/produk/' . $photos->name) .'"
                                                    alt="'. $item->name .'" class="rounded-top border-bottom"
                                                    style="width: 100%; height: 11rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">';
                                            } else {
                                                $output .= '<img src="'. asset('img/no-image.png') .'"
                                                    alt="'. $item->name .'" class="rounded-top border-bottom"
                                                    style="width: 100%; height: 11rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">';
                                            }
                                        }
                                    } else {
                                        $output .= '<img src="'. asset('img/no-image.png') .'" alt="'. $item->name .'"
                                            class="rounded-top border-bottom"
                                            style="width: 100%; height: 11rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">';
                                    }
                                    $output .= '</a>
                            </div>
                            <div
                                class="card-body p-3 bg-light opacity-90">';
                                if ($item->product->discount != 0) {
                                    $output .= '<div class="d-flex justify-content-between">
                                        <p class="m-0 text-sm"><a class="text-secondary"
                                                href="'. url('product-category/' . $item->product->product_category->slug) .'">'. $item->product->product_category->name .'</a>
                                        </p>
                                        <p class="small m-0 badge bg-danger">'. $item->product->discount .'%
                                            OFF</p>
                                    </div>';
                                } else {
                                    $output .= '<p class="m-0 text-sm"><a class="text-secondary"
                                            href="'. url('product-category/' . $item->product->product_category->slug) .'">'. $item->product->product_category->name .'</a>
                                    </p>';
                                }
                                $output .= '<p class="small m-0">Stok tersisa '. $item->product->stoke .'</p>
                                <h6 class="title">
                                    <a href="'. url('home/' . $item->product->slug) .'"
                                        style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 1; overflow: hidden;">'. $item->product->name .'</a>
                                </h6>
                                <div>';
                                    if ($item->product->stock_out) {
                                        $output .= '<span class="small">'. $item->product->stock_out .' Terjual</span>';
                                    } else {
                                        $output .= '<span class="small">0 Terjual</span>';
                                    }
                                $output .= '</div>';

                                // PHP
                                    $reviews = Review::where('product_id', $item->product->id)->get();
                                    $ratingSum = Review::where('product_id', $item->product->id)->sum('stars_rated');
                                    if ($reviews->count() > 0) {
                                        $ratingValue = $ratingSum / $reviews->count();
                                    } else {
                                        $ratingValue = 0;
                                    }
                                    $rateNum = number_format($ratingValue);
                                // END PHP

                                for ($i = 1; $i <= $rateNum; $i++) {
                                    $output .= '<span><i class="lni lni-star-filled" style="color: #f0d800;"></i></span>';
                                }
                                for ($j = $rateNum + 1; $j <= 5; $j++) {
                                    $output .= '<span><i class="lni lni-star"></i>
                                    </span>';
                                }
                                $output .= '<p class="mb-4 text-sm fw-bold">
                                    Rp. '. number_format($item->product->price, 0) .'
                                </p>
                                <input type="hidden" name="quantity"
                                    class="form-control qty-input text-center" value="1">
                                <input type="hidden" value="'. $item->product_id .'" id="prod_id">
                                <div class="d-flex align-items-center justify-content-between">';
                                    if ($item->product->stoke === 0) {
                                        $output .= '<button type="button" disabled
                                            class="btn btn-outline-primary btn-sm mb-0">+
                                            Keranjang</button>';
                                    } else {
                                        $output .= '<button type="button" id="addToCartBtn"
                                            class="btn btn-outline-primary btn-sm mb-0">+
                                            Keranjang</button>';
                                    }
                                    $output .= '<button type="button" id="delete-cart-wishlistItem"
                                        class="btn btn-outline-primary btn-sm mb-0">
                                        <i class="bi bi-trash h-5 text-danger"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                } else {
                    $output .= '
                    <div class="col-xl-3 col-md-6 mb-xl-0 mt-3" id="product_data">
                        <div class="card card-blog border rounded bg-white shadow card-plain"
                            style="height: 26rem">
                            <div class="">
                                <a href="'. url('home/' . $item->product->slug) .'">';
                                    if ($item->product->stoke === 0) {
                                        $output .= '<div style="z-index: 3"
                                            class="badge bg-danger px-3 position-absolute top-30 start-50 translate-middle">
                                            <h5 class="text-white m-0">Stok Habis</h5>
                                        </div>';
                                    }
                                    if ($item->product->photo_product->count() > 0) {
                                        foreach ($item->product->photo_product->take(1) as $photos) {
                                            if ($photos->name) {
                                                $output .= '<img src="'. asset('../storage/produk/' . $photos->name) .'"
                                                    alt="'. $item->name .'" class="rounded-top border-bottom"
                                                    style="width: 100%; height: 11rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">';
                                            } else {
                                                $output .= '<img src="'. asset('img/no-image.png') .'"
                                                    alt="'. $item->name .'" class="rounded-top border-bottom"
                                                    style="width: 100%; height: 11rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">';
                                            }
                                        }
                                    } else {
                                        $output .= '<img src="'. asset('img/no-image.png') .'" alt="'. $item->name .'"
                                            class="rounded-top border-bottom"
                                            style="width: 100%; height: 11rem; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;">';
                                    }
                                    $output .= '</a>
                            </div>
                            <div
                                class="card-body p-3">';
                                if ($item->product->discount != 0) {
                                    $output .= '<div class="d-flex justify-content-between">
                                        <p class="m-0 text-sm"><a class="text-secondary"
                                                href="'. url('product-category/' . $item->product->product_category->slug) .'">'. $item->product->product_category->name .'</a>
                                        </p>
                                        <p class="small m-0 badge bg-danger">'. $item->product->discount .'%
                                            OFF</p>
                                    </div>';
                                } else {
                                    $output .= '<p class="m-0 text-sm"><a class="text-secondary"
                                            href="'. url('product-category/' . $item->product->product_category->slug) .'">'. $item->product->product_category->name .'</a>
                                    </p>';
                                }
                                $output .= '<p class="small m-0">Stok tersisa '. $item->product->stoke .'</p>
                                <h6 class="title">
                                    <a href="'. url('home/' . $item->product->slug) .'"
                                        style="display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 1; overflow: hidden;">'. $item->product->name .'</a>
                                </h6>
                                <div>';
                                    if ($item->product->stock_out) {
                                        $output .= '<span class="small">'. $item->product->stock_out .' Terjual</span>';
                                    } else {
                                        $output .= '<span class="small">0 Terjual</span>';
                                    }
                                $output .= '</div>';

                                // PHP
                                    $reviews = Review::where('product_id', $item->product->id)->get();
                                    $ratingSum = Review::where('product_id', $item->product->id)->sum('stars_rated');
                                    if ($reviews->count() > 0) {
                                        $ratingValue = $ratingSum / $reviews->count();
                                    } else {
                                        $ratingValue = 0;
                                    }
                                    $rateNum = number_format($ratingValue);
                                // END PHP

                                for ($i = 1; $i <= $rateNum; $i++) {
                                    $output .= '<span><i class="lni lni-star-filled" style="color: #f0d800;"></i></span>';
                                }
                                for ($j = $rateNum + 1; $j <= 5; $j++) {
                                    $output .= '<span><i class="lni lni-star"></i>
                                    </span>';
                                }
                                $output .= '<p class="mb-4 text-sm fw-bold">
                                    Rp. '. number_format($item->product->price, 0) .'
                                </p>
                                <input type="hidden" name="quantity"
                                    class="form-control qty-input text-center" value="1">
                                <input type="hidden" value="'. $item->product_id .'" id="prod_id">
                                <div class="d-flex align-items-center justify-content-between">';
                                    if ($item->product->stoke === 0) {
                                        $output .= '<button type="button" disabled
                                            class="btn btn-outline-primary btn-sm mb-0">+
                                            Keranjang</button>';
                                    } else {
                                        $output .= '<button type="button" id="addToCartBtn"
                                            class="btn btn-outline-primary btn-sm mb-0">+
                                            Keranjang</button>';
                                    }
                                    $output .= '<button type="button" id="delete-cart-wishlistItem"
                                        class="btn btn-outline-primary btn-sm mb-0">
                                        <i class="bi bi-trash h-5 text-danger"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                }
			}
			echo $output;
		} else {
            echo '<div id="app">
                <section class="section">
                    <div class="container">
                        <div class="page-error">
                            <div class="page-inner">
                                <div class="page-description">
                                    Tidak ada produk favorit yang dipilih!
                                </div>
                                <div class="mt-3">
                                    <a href="/new-product"
                                        class="btn btn-outline-primary btn-sm mb-0">
                                        Belanja Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>';
		}
	}

    public function addToWishlist(Request $request)
    {
        $product_id = $request->input('product_id');

        if(Auth::check()) {

            if (Auth()->user()->hasRole('pembeli')) {
                $prod_check = Product::where('id', $product_id)->first();
                if ($prod_check) {
                    if (Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                        return response()->json([
                            'message' => 'gagal',
                            'status' => $prod_check->name . " sudah ditambahkan ke Wishlist!"]
                        );
                    } else {
                        $wishlist = new Wishlist();
                        $wishlist->user_id = Auth::id();
                        $wishlist->product_id = $product_id;
                        $wishlist->save();
                        return response()->json([
                            'message' => 'berhasil',
                            'status' => $prod_check->name . " ditambahkan ke Wishlist"
                        ]);
                    }
                }
            } else {
                return response()->json([
                    'status' => "Hanya bisa dilakukan akun pembeli!",
                ]);
            }
        } else {
            return response()->json([
                'status' => "Silahkan login!",
            ]);
        }
    }

    public function deleteWishlistItem(Request $request)
    {
        if(Auth::check() && Auth()->user()->hasRole('pembeli')) {
            $product_id = $request->input('product_id');
            if (Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                $wishlist = Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $wishlist->delete();
                return response()->json(['status' => $wishlist->product->name . " berhasil dihapus dari Wishlist!"]);
            }
        } else {
            return response()->json(['status' => "Silahkan login!"]);
        }
    }
}
