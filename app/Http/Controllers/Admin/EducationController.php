<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\User;
use App\Models\EducationCategory;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Carbon\Carbon;
use Illuminate\Support\Str;

class EducationController extends Controller
{
    // set index page view
	public function index() {
		$category = EducationCategory::all();
        $authorizedRoles = ['gapoktan', 'poktan'];
        $user = User::whereHas('roles', static function ($query) use ($authorizedRoles) {
                    return $query->whereIn('name', $authorizedRoles);
                })->get();
		return view('admin.edukasi.index', compact('category', 'user'));
	}

    // handle fetch all eamployees ajax request
	public function fetchAll() {
		$emps = Education::with('education_category')->latest()->get();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table id="example1" class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>File</th>
                <th>Judul</th>
                <th>Kategori Edukasi</th>
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
                $ext = pathinfo($emp->file, PATHINFO_EXTENSION);
                if ($ext == 'mp4' || $ext == 'mov' || $ext == 'vob' || $ext == 'mpeg' || $ext == '3gp' || $ext == 'avi' || $ext == 'wmv' || $ext == 'mov' || $ext == 'amv' || $ext == 'svi' || $ext == 'flv' || $ext == 'mkv' || $ext == 'webm' || $ext == 'gif' || $ext == 'asf') {
                    $output .= '<td><video src="../storage/edukasi/' . $emp->file . '" frameborder="0" class="img-fluid img-thumbnail" style="width: 100px; height: 65px; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"></video></td>';
                } elseif ($ext == 'PNG' || $ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'svg' || $ext == 'gif' || $ext == 'tiff' || $ext == 'psd' || $ext == 'pdf' || $ext == 'eps' || $ext == 'ai' || $ext == 'indd' || $ext == 'raw') {
                    $output .= '<td><img src="../storage/edukasi/' . $emp->file . '" class="img-fluid img-thumbnail" style="width: 100px; height: 65px; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"></td>';
                } elseif(empty($emp->file)) {
                    $output .= '<td><img src="../stisla/assets/img/example-image.jpg" class="img-fluid img-thumbnail" style="width: 100px; height: 65px; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"></td>';
                }
                $output .= '<td>' . $emp->title . '</td>';
                if (empty($emp->education_category->name)) {
                    $output .= '<td><span class="text-danger">Tidak ada kategori</span></td>';
                } else {
                    $output .= '<td>' . $emp->education_category->name . '</td>';
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
			echo '<h1 class="text-center text-secondary my-5">Tidak ada data Edukasi!</h1>';
		}
	}

    // handle insert a new employee ajax request
	public function store(Request $request) {
        if ($request->file('file')) {
            $file = $request->file('file');
		    $fileName = time() . '.' . $file->getClientOriginalExtension();
		    $file->storeAs('edukasi', $fileName);
		    $empData = ['title' => $request->title, 'slug' => $request->slug, 'category_education_id' => $request->category_education_id, 'desc' => $request->desc, 'file' => $fileName];
        } else {
		    $empData = ['title' => $request->title, 'slug' => $request->slug, 'category_education_id' => $request->category_education_id, 'desc' => $request->desc];
        }
            $empData['date'] = Carbon::now()->format('Y-m-d');
            $empData['user_id'] = $request->user_id;
            Education::create($empData);
		return response()->json([
			'status' => 200,
		]);
	}

    // handle edit an employee ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$emp = Education::with('user')->find($id);
		return response()->json($emp);
	}

	// handle update an employee ajax request
	public function update(Request $request) {
		$fileName = '';
		$emp = Education::find($request->emp_id);
		if ($request->hasFile('file')) {
			$file = $request->file('file');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('edukasi', $fileName);
			if ($emp->file) {
				Storage::delete('edukasi/' . $emp->file);
			}
		} else {
			$fileName = $request->emp_avatar;
		}

        if ($request->user_id) {
            $empData = ['title' => $request->title, 'slug' => $request->slug, 'category_education_id' => $request->category_education_id, 'desc' => $request->desc, 'file' => $fileName];
            $empData['date'] = Carbon::now()->format('Y-m-d');
            $empData['user_id'] = $request->user_id;
        } else {
            $empData = ['title' => $request->title, 'slug' => $request->slug, 'category_education_id' => $request->category_education_id, 'desc' => $request->desc, 'file' => $fileName];
            $empData['date'] = Carbon::now()->format('Y-m-d');
        }

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}

    // handle delete an employee ajax request
	public function delete(Request $request) {
		$id = $request->id;
		$emp = Education::find($id);
		if (Storage::delete('edukasi/' . $emp->file)) {
			Education::destroy($id);
		} else {
            $emp->delete();
        }
	}

    public function checkSlug(Request $request)
    {
        // Old version: without uniqueness
        $slug = $request->title;

        // New version: to generate unique slugs
        $slug = SlugService::createSlug(Education::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }

}
