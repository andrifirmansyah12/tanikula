<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;
use App\Models\ActivityCategory;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    // set index page view
	public function index() {
		$category = ActivityCategory::all();
        $authorizedRoles = ['gapoktan', 'poktan'];
        $user = User::whereHas('roles', static function ($query) use ($authorizedRoles) {
            return $query->whereIn('name', $authorizedRoles);
        })->get();
		return view('admin.kegiatan.index', compact('category', 'user'));
	}

    // handle fetch all eamployees ajax request
	public function fetchAll() {
		$emps = Activity::with('activity_category')->latest()->get();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table id="example1" class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori Kegiatan</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>';
            $nomor=1;
			foreach ($emps as $emp) {
				$output .= '<tr>';
                $output .= '<td>' . $nomor++ . '</td>';
                $output .= '<td>' . $emp->title . '</td>';
                if (empty($emp->activity_category->name)) {
                    $output .= '<td><a class="text-danger">Tidak ada kategori</a></p>';
                } else {
                    $output .= '<td>' . $emp->activity_category->name . '</td>';
                }
                $output .= '<td>' . date("d F Y", strtotime($emp->date)) . '</td>
                <td class="desc text-justify">' . $emp->desc . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>
                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Tidak ada data Kegiatan!</h1>';
		}
	}

    // handle insert a new employee ajax request
	public function store(Request $request) {

        $empData = ['title' => $request->title, 'slug' => $request->slug, 'category_activity_id' => $request->category_activity_id, 'desc' => $request->desc];

        $empData['date'] = Carbon::createFromFormat('d-M-Y', $request->date)->format('Y-m-d h:i:s');
        $empData['user_id'] = $request->user_id;
		Activity::create($empData);
		return response()->json([
			'status' => 200,
		]);
	}

    // handle edit an employee ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$emp = Activity::with('user')->find($id);
		return response()->json($emp);
	}

	// handle update an employee ajax request
	public function update(Request $request)
    {
        $emp = Activity::find($request->emp_id);

        if ($request->user_id) {
            $empData = ['title' => $request->title, 'slug' => $request->slug, 'category_activity_id' => $request->category_activity_id, 'desc' => $request->desc];
            $empData['date'] = Carbon::createFromFormat('d-M-Y', $request->date)->format('Y-m-d h:i:s');
            $empData['user_id'] = $request->user_id;
        } else {
            $empData = ['title' => $request->title, 'slug' => $request->slug, 'category_activity_id' => $request->category_activity_id, 'desc' => $request->desc];
            $empData['date'] = Carbon::createFromFormat('d-M-Y', $request->date)->format('Y-m-d h:i:s');
        }
		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}

    // handle delete an employee ajax request
	public function delete(Request $request)
    {
		$id = $request->id;
		// $emp = Activity::find($id);
		$emp = Activity::with('activity_category')->where('id', $id);
        $emp->delete();
	}

    public function checkSlug(Request $request)
    {
        // Old version: without uniqueness
        $slug = $request->title;

        // New version: to generate unique slugs
        $slug = SlugService::createSlug(Activity::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
