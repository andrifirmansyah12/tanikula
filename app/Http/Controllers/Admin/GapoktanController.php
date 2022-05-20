<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poktan;
use App\Models\Gapoktan;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;

class GapoktanController extends Controller
{
    // set index page view
	public function index() {
        $gapoktan = Gapoktan::all();
		return view('admin.gapoktan.index', compact('gapoktan'));
	}

    // handle fetch all eamployees ajax request
	public function fetchAll(Request $request) {
		// $emps = Poktan::with('user', 'gapoktan')->latest()->get();
        $emps = Gapoktan::join('users', 'gapoktans.user_id', '=', 'users.id')
                    ->select('gapoktans.*', 'users.name as gapoktan_name')
                    ->orderBy('updated_at', 'desc')
                    ->get();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table id="example1" class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Gapoktan</th>
                <th>Ketua Gapoktan</th>
                <th>Kota</th>
                <th>Alamat</th>
                <th>No.Telp</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>';
            $nomor=1;
			foreach ($emps as $emp) {
                // if ($emp->gapoktan->user->name == auth()->user()->name) {
                    $output .= '<tr>';
                    $output .= '<td>' . $nomor++ . '</td>';
                    if (empty($emp->image)) {
                        $output .= '<td><img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian"></td>';
                    } else {
                        $output .= '<td><img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian"></td>';
                    }
                    $output .= '<td>' . $emp->gapoktan_name . '</td>
                    <td>' . $emp->chairman . '</td>';
                    if ($emp->city) {
                        $output .= '<td>' . $emp->city . '</td>';
                    } else {
                        $output .= '<td><span class="text-danger">Belum diisi</span></td>';
                    }
                    if ($emp->address) {
                        $output .= '<td>' . $emp->address . '</td>';
                    } else {
                        $output .= '<td><span class="text-danger">Belum diisi</span></td>';
                    }
                    if ($emp->telp) {
                        $output .= '<td>' . $emp->telp . '</td>';
                    } else {
                        $output .= '<td><span class="text-danger">Belum diisi</span></td>';
                    }
                    // if ($emp->is_active == 1) {
                    //     $output .= '<td><div class="badge badge-success">Aktif</div></td>';
                    // } elseif ($emp->is_active == 0) {
                    //     $output .= '<td><div class="badge badge-danger">Belum Aktif</div></td>';
                    // }
                    $output .= '<td>
                    <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>
                    <a href="#" id="' . $emp->user->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                    </td>
                </tr>';
                // }
                // elseif ($emp->gapoktan->user->name == !auth()->user()->name) {
                //     $output .= '<h1 class="text-center text-secondary my-5">Tidak ada data Poktan!</h1>';
                // }
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Tidak ada data Poktan!</h1>';
		}
	}

    // handle insert a new employee ajax request
	public function store(Request $request) {

		$user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->assignRole('gapoktan');
        $user->save();

        $chairman = $request->chairman;
        // $is_active = $request->is_active ? 1 : 0;
        Gapoktan::create([
            'user_id' => $user->id,
            'chairman' => $chairman,
            // 'is_active' => $is_active,
        ]);
		return response()->json([
			'status' => 200,
		]);
	}

    // handle edit an employee ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$emp = Gapoktan::with('user')->where('id', $id)->first();
		return response()->json($emp);
	}

	// handle update an employee ajax request
	public function update(Request $request) {

        $user = User::find($request->user_id);
        if($request->password) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
        }
        $user->save();

        $emp = Gapoktan::with('user')->find($request->emp_id);
        $emp->chairman = $request->input('chairman');
        // if ($request->input('gapoktan_id')) {
        //     $emp->gapoktan_id = $request->input('gapoktan_id');
        //     $emp->chairman = $request->input('chairman');
        //     if ($request->is_active == 0) {
        //         $emp->is_active = $request->is_active ? 1 : 0;
        //     } elseif ($request->is_active == 1) {
        //         $emp->is_active = $request->is_active ? 0 : 1;
        //     }
        // } else {
        //     $emp->chairman = $request->input('chairman');
        //     if ($request->is_active == 0) {
        //         $emp->is_active = $request->is_active ? 1 : 0;
        //     } elseif ($request->is_active == 1) {
        //         $emp->is_active = $request->is_active ? 0 : 1;
        //     }
        // }

        $emp->save();

		return response()->json([
			'status' => 200,
		]);
	}

    // handle delete an employee ajax request
	public function delete(Request $request) {
		$id = $request->id;
		Gapoktan::where('user_id', $id)->delete();
        User::where('id', $id)->delete();
	}
}
