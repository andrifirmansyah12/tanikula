<?php

namespace App\Http\Controllers\Gapoktan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    // set index page view
	public function index() {
		$category = ProductCategory::all();
		return view('gapoktan.produk.index', compact('category'));
	}

    // handle fetch all eamployees ajax request
	public function fetchAll() {
		$emps = Product::where('user_id', auth()->user()->id)->with('product_category')->latest()->get();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Kategori Produk</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>';
            $nomor=1;
			foreach ($emps as $emp) {
				$output .= '<tr>';
                $output .= '<td>' . $nomor++ . '</td>';
                if (empty($emp->image)) {
                    $output .= '<td><img src="../stisla/assets/img/example-image.jpg" class="img-fluid img-thumbnail" style="width: 100px; height: 65px; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"></td>';
                } else {
                    $output .= '<td><img src="../storage/produk/' . $emp->image . '" class="img-fluid img-thumbnail" style="width: 100px; height: 65px; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"></td>';
                }
                $output .= '<td>' . $emp->code . '</td>
                <td>' . $emp->name . '</td>';
                if (empty($emp->product_category->name)) {
                    $output .= '<td><a class="text-danger">Tidak ada kategori</a></p>';
                } else {
                    $output .= '<td>' . $emp->product_category->name . '</td>';
                }
                $output .= '<td>' . $emp->stoke . '</td>
                <td>' . $emp->price . '</td>
                <td>' . $emp->desc . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>
                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Tidak ada data Produk!</h1>';
		}
	}

    // handle insert a new employee ajax request
	public function store(Request $request) {
        if ($request->file('image')) {
            $image = $request->file('image');
		    $fileName = time() . '.' . $image->getClientOriginalExtension();
		    $image->storeAs('produk', $fileName);

		    $empData = ['name' => $request->name, 'slug' => $request->slug, 'category_product_id' => $request->category_product_id, 'stoke' => $request->stoke, 'price' => $request->price, 'desc' => $request->desc, 'image' => $fileName];
        } else {

		    $empData = ['name' => $request->name, 'slug' => $request->slug, 'category_product_id' => $request->category_product_id, 'stoke' => $request->stoke, 'price' => $request->price, 'desc' => $request->desc];

        }

        $empData['code'] = random_int(1000, 9999);
        $empData['user_id'] = auth()->user()->id;
		Product::create($empData);
		return response()->json([
			'status' => 200,
		]);
	}

    // handle edit an employee ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$emp = Product::find($id);
		return response()->json($emp);
	}

	// handle update an employee ajax request
	public function update(Request $request) {
		$fileName = '';
		$emp = Product::find($request->emp_id);
		if ($request->hasFile('image')) {
			$image = $request->file('image');
			$fileName = time() . '.' . $image->getClientOriginalExtension();
			$image->storeAs('produk', $fileName);
			if ($emp->image) {
				Storage::delete('produk/' . $emp->image);
			}
		} else {
			$fileName = $request->emp_avatar;
		}

        $empData = ['name' => $request->name, 'slug' => $request->slug, 'category_product_id' => $request->category_product_id, 'stoke' => $request->stoke, 'price' => $request->price, 'desc' => $request->desc, 'image' => $fileName];

        $empData['user_id'] = auth()->user()->id;
		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}

    // handle delete an employee ajax request
	public function delete(Request $request) {
		$id = $request->id;
		$emp = Product::find($id);
		if (Storage::delete('edukasi/' . $emp->file)) {
			Product::destroy($id);
		} else {
            $emp->delete();
        }
	}

    public function checkSlug(Request $request)
    {
        // Old version: without uniqueness
        $slug = $request->name;

        // New version: to generate unique slugs
        $slug = SlugService::createSlug(Product::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
