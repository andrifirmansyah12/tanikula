<?php

namespace App\Http\Controllers\Poktan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\EducationCategory;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class EducationController extends Controller
{
    // set index page view
	public function index() {
		$category = EducationCategory::all();
		return view('poktan.edukasi.index', compact('category'));
	}

    // handle fetch all eamployees ajax request
	public function fetchAll() {
		$emps = Education::where('user_id', auth()->user()->id)->with('education_category')->get();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>File</th>
                <th>Judul</th>
                <th>Kategori Edukasi</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>';
                $ext = pathinfo($emp->file, PATHINFO_EXTENSION);
                if ($ext == 'mp4' || $ext == 'mov' || $ext == 'vob' || $ext == 'mpeg' || $ext == '3gp' || $ext == 'avi' || $ext == 'wmv' || $ext == 'mov' || $ext == 'amv' || $ext == 'svi' || $ext == 'flv' || $ext == 'mkv' || $ext == 'webm' || $ext == 'gif' || $ext == 'asf') {
                    $output .= '<td><iframe src="../storage/edukasi/' . $emp->file . '" frameborder="0" class="img-fluid img-thumbnail" style="width: 100px; height: 65px; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"></iframe></td>';
                } elseif ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'svg' || $ext == 'gif' || $ext == 'tiff' || $ext == 'psd' || $ext == 'pdf' || $ext == 'eps' || $ext == 'ai' || $ext == 'indd' || $ext == 'raw') {
                    if ($emp->file) {
                        $output .= '<td><img src="../storage/edukasi/' . $emp->file . '" class="img-fluid img-thumbnail" style="width: 100px; height: 65px; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"></td>';
                    } else {
                        $output .= '<td><img src="../img/no-image.png" class="img-fluid img-thumbnail" style="width: 100px; height: 65px; -o-object-fit: cover; object-fit: cover; -o-object-position: center; object-position: center;"></td>';
                    }
                }
                $output .= '<td>' . $emp->title . '</td>';
                if (empty($emp->education_category->name)) {
                    $output .= '<td><a class="text-danger">Tidak ada kategori</a></p>';
                } else {
                    $output .= '<td>' . $emp->education_category->name . '</td>';
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
			echo '<h1 class="text-center text-secondary my-5">Tidak ada data Edukasi!</h1>';
		}
	}

    // handle insert a new employee ajax request
	public function store(Request $request) {
        if ($request->file('file')) {
            $file = $request->file('file');
		    $fileName = time() . '.' . $file->getClientOriginalExtension();
		    $file->storeAs('edukasi', $fileName);

		    $empData = ['title' => $request->title, 'slug' => $request->slug, 'education_category_id' => $request->education_category_id, 'date' => $request->date , 'desc' => $request->desc, 'file' => $fileName];
        } else {

		    $empData = ['title' => $request->title, 'slug' => $request->slug, 'education_category_id' => $request->education_category_id, 'date' => $request->date , 'desc' => $request->desc];

        }

        $empData['user_id'] = auth()->user()->id;
		Education::create($empData);
		return response()->json([
			'status' => 200,
		]);
	}

    // handle edit an employee ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$emp = Education::find($id);
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

		$empData = ['title' => $request->title, 'slug' => $request->slug, 'education_category_id' => $request->education_category_id, 'date' => $request->date , 'desc' => $request->desc, 'file' => $fileName];

        $empData['user_id'] = auth()->user()->id;
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
        $slug = SlugService::createSlug(Education::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
