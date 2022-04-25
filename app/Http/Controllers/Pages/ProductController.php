<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $category_product = ProductCategory::all();
        $product_new = Product::with('product_category')->latest()->get();
        $product_search = Product::with('product_category')->orderByRaw('RAND()')->latest()->get();
        return view('pages.home.index', compact('category_product', 'product_new', 'product_search'));
    }

    public function viewCategory($slug)
    {
        if (ProductCategory::where('slug', $slug)->exists()) {
            $category_product = ProductCategory::where('slug', $slug)->first();
            $product = Product::where('category_product_id', $category_product->id)->get();
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
