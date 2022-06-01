<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\Poktan;
use Illuminate\Support\Facades\DB;
use App\Models\Farmer;
use App\Models\NotificationPlant;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PlantController extends Controller
{
    // set index page view
	public function index() {
        $farmer = Farmer::where('user_id', '=', auth()->user()->id)->get();
		return view('petani.tandur.index', compact('farmer'));
	}

    // handle fetch all eamployees ajax request
	public function fetchAll(Request $request) {
		// $emps = Poktan::with('user', 'gapoktan')->latest()->get();
        $emps = Plant::join('farmers', 'plants.farmer_id', '=', 'farmers.id')
                    ->join('poktans', 'plants.poktan_id', '=', 'poktans.id')
                    ->select('plants.*', 'surface_area as area')
                    ->where('farmers.user_id', '=', auth()->user()->id)
                    ->where('plants.harvest_date', '=', null)
                    ->orderBy('updated_at', 'desc')
                    ->get();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Poktan</th>
                <th>Nama Petani</th>
                <th>Tanaman Tandur</th>
                <th>Area</th>
                <th>Tanggal Tandur</th>
                <th>Tanggal Panen</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>';
            $nomor=1;
			foreach ($emps as $emp) {
                $output .= '<tr>';
                $output .= '<td>' . $nomor++ . '</td>';
                $output .= '<td>' . $emp->poktan->user->name . '</td>
                <td>' . $emp->farmer->user->name . '</td>
                <td>' . $emp->plant_tanaman . '</td>';
                if ($emp->area) {
                    $output .= '<td>' . $emp->area . '</td>';
                } else {
                    $output .= '<td><span class="text-danger">Belum diisi</span></td>';
                }
                if ($emp->plating_date) {
                    $output .= '<td>' . date("d-F-Y", strtotime($emp->plating_date)) . '</td>';
                } else {
                    $output .= '<td><span class="text-danger">Belum diisi</span></td>';
                }
                if ($emp->harvest_date) {
                    $output .= '<td>' . date("d-F-Y", strtotime($emp->harvest_date)) . '</td>';
                } else {
                    $output .= '<td><span class="text-danger">Belum diisi</span></td>';
                }
                if (empty($emp->harvest_date)) {
                    $output .= '<td><div class="badge badge-warning">Tandur</div></td>';
                } else {
                    $output .= '<td><div class="badge badge-success">Panen</div></td>';
                }
                $output .= '<td>
                    <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>
                    <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
            </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Tidak ada data Tandur!</h1>';
		}
	}

    // handle insert a new employee ajax request
	public function store(Request $request)
    {
		$plant = new Plant();
        $plant->farmer_id = $request->farmer_id;
        $plant->poktan_id = $request->poktan_id;
        $plant->plant_tanaman = $request->plant_tanaman;
        $plant->surface_area = $request->surface_area;
        $plant->plating_date = Carbon::createFromFormat('d-M-Y', $request->plating_date)->format('Y-m-d h:i:s');
        $plant->save();

        $notification = new NotificationPlant();
        $notification->plant_id = $plant->id;
        $notification->save();

		return response()->json([
			'status' => 200,
		]);
	}

    // handle edit an employee ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$emp = Plant::with('poktan', 'farmer')->where('id', $id)->first();
		return response()->json($emp);
	}

	// handle update an employee ajax request
	public function update(Request $request) {

        $plant = Plant::with('poktan', 'farmer')->find($request->emp_id);
        $plant->farmer_id = $request->farmer_id;
        $plant->poktan_id = $request->poktan_id;
        $plant->plant_tanaman = $request->plant_tanaman;
        $plant->surface_area = $request->surface_area;
        $plant->harvest_date = Carbon::createFromFormat('d-M-Y', $request->harvest_date)->format('Y-m-d h:i:s');
        $plant->save();

        $notificationExists = NotificationPlant::with('plant')->where('read_at', null)->first();
        if($notificationExists){
            $notificationPlant = NotificationPlant::with('plant')->where('plant_id', $request->emp_id)->update([
                'read_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        } else {
            $notificationPlant = NotificationPlant::with('plant')->where('plant_id', $request->emp_id)->update([
                'read_at' => Carbon::now(),
            ]);
        }

		return response()->json([
			'status' => 200,
		]);
	}

    // handle delete an employee ajax request
	public function delete(Request $request) {
		$id = $request->id;
		$emp = Plant::with('poktan', 'farmer')->where('id', $id);
        $emp->delete();
	}
}
