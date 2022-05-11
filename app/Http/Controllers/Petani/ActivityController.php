<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
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
		return view('petani.kegiatan.index', compact('category'));
	}

    // handle fetch all eamployees ajax request
	public function fetchAll() {
		$emps = Activity::with('activity_category')->latest()->get();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>No</th>
                <th>Dibuat Oleh</th>
                <th>Judul Kegiatan</th>
                <th>Tanggal Kegiatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>';
            $nomor=1;
			foreach ($emps as $emp) {
				$output .= '<tr>';
                $output .= '<td>' . $nomor++ . '</td>';
                $output .= '<td>' . $emp->user->name . '</td>';
                $output .= '<td>' . $emp->title . '</td>';
                $output .= '<td>' . date("d F Y", strtotime($emp->date)) . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editEmployeeModal"><i class="bi-eye h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Tidak ada data Kegiatan!</h1>';
		}
	}

    // handle edit an employee ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$emp = Activity::with('user', 'activity_category')->find($id);
		return response()->json($emp);
	}

}
