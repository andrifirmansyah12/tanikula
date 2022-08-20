<?php

namespace App\Http\Controllers\Gapoktan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    // set index page view
	public function index() {
		return view('gapoktan.produk-kategori.index');
	}

    // handle fetch all eamployees ajax request
	public function fetchAll()
    {
		$emps = ProductCategory::latest()->get();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Status Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>';
            $nomor=1;
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td>' . $nomor++ . '</td>
                <td>' . $emp->name . '</td>';
                if ($emp->is_active == 1) {
                    $output .= '<td><div class="badge badge-success">Aktif</div></td>';
                } elseif ($emp->is_active == 0) {
                    $output .= '<td><div class="badge badge-danger">Tidak Aktif</div></td>';
                }
                $output .= '<td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Tidak ada data Kategori Produk!</h1>';
		}
	}

    // handle insert a new employee ajax request
	public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:product_categories|max:50',
        ], [
            'name.required' => 'Nama kategori produk diperlukan!',
            'name.max' => 'Nama kategori produk maksimal 50 karakter!',
            'name.unique' => 'Nama Kategori Produk yang anda masukkan sudah ada!',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $is_active = $request->is_active ? 1 : 0;
            $empData = ['name' => $request->name, 'slug' => $request->slug, 'is_active' => $is_active];

            ProductCategory::create($empData);
            return response()->json([
                'status' => 200,
            ]);
        }
	}

    // handle edit an employee ajax request
	public function edit(Request $request)
    {
		$id = $request->id;
		$emp = ProductCategory::find($id);
		return response()->json($emp);
	}

    // handle update an employee ajax request
	public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
        ], [
            'name.required' => 'Nama kategori produk diperlukan!',
            'name.max' => 'Nama kategori produk maksimal 50 karakter!',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $emp = ProductCategory::find($request->emp_id);

            if ($request->is_active == 0) {
                $is_active = $request->is_active ? 1 : 0;
                $empData = ['name' => $request->name, 'slug' => $request->slug, 'is_active' => $is_active];
            } elseif ($request->is_active == 1) {
                $is_active = $request->is_active ? 0 : 1;
                $empData = ['name' => $request->name, 'slug' => $request->slug, 'is_active' => $is_active];
            }

            $emp->update($empData);
            return response()->json([
                'status' => 200,
            ]);
        }
	}

    public function checkSlug(Request $request)
    {
        // Old version: without uniqueness
        $slug = $request->name;

        // New version: to generate unique slugs
        $slug = SlugService::createSlug(ProductCategory::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
