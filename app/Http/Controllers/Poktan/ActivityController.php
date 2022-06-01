<?php

namespace App\Http\Controllers\Poktan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\ActivityCategory;
use App\Models\NotificationActivity;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    // set index page view
	public function index() {
		$category = ActivityCategory::all();
		return view('poktan.kegiatan.index', compact('category'));
	}

    // handle fetch all eamployees ajax request
	public function fetchAll() {
		$emps = Activity::where('user_id', auth()->user()->id)->with('activity_category')->latest()->get();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
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
			echo '<h1 class="text-center text-secondary my-5">Tidak ada data Kegiatan!</h1>';
		}
	}

    // handle insert a new employee ajax request
	public function store(Request $request) {

        $activity = new Activity();
        $activity->title = $request->title;
        $activity->slug = $request->slug;
        $activity->category_activity_id = $request->category_activity_id;
        $activity->desc = $request->desc;
        $activity->date = Carbon::createFromFormat('d-M-Y', $request->date)->format('Y-m-d h:i:s');
        $activity->user_id = auth()->user()->id;
        $activity->save();

        $notification = new NotificationActivity();
        $notification->activity_id = $activity->id;
        $notification->save();

		return response()->json([
			'status' => 200,
		]);
	}

    // handle edit an employee ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$emp = Activity::find($id);
		return response()->json($emp);
	}

	// handle update an employee ajax request
	public function update(Request $request)
    {
        $emp = Activity::find($request->emp_id);

        $empData = ['title' => $request->title, 'slug' => $request->slug, 'category_activity_id' => $request->category_activity_id, 'desc' => $request->desc];

        $empData['date'] = Carbon::createFromFormat('d-M-Y', $request->date)->format('Y-m-d h:i:s');
        $empData['user_id'] = auth()->user()->id;
		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}

    // handle delete an employee ajax request
	public function delete(Request $request)
    {
		$id = $request->id;
		$emp = Activity::find($id);
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
