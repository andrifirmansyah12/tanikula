<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\PhotoProduct;

class ProductController extends Controller
{
    public function index()
    {
        $category_product = ProductCategory::where('is_active', '=', 1)->latest()->get();
        $product_new = Product::with('photo_product')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.updated_at', 'desc')
                    ->get();
        $product_search = Product::with('photo_product')
                    ->join('product_categories', 'products.category_product_id', '=', 'product_categories.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select('products.*', 'product_categories.name as category_name')
                    ->where('product_categories.is_active', '=', 1)
                    ->where('products.is_active', '=', 1)
                    ->orderBy('products.updated_at', 'desc')
                    ->orderByRaw('RAND()')
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
            // $photoProduct = PhotoProduct::where('product_id', $product->id)->get();
            return view('pages.home.detail', compact('product'));
        } else {
            return redirect('/')->with('status', 'Produk tidak ditemukan');
        }
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
                return view('pages.home.detail', compact('product'));
            } else {
                return redirect('/')->with('status', 'The link was broken!');
            }

        } else {
            return redirect('/')->with('status', 'No such category found!');
        }

    }
}
