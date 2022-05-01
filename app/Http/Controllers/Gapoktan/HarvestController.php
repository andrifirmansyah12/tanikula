<?php

namespace App\Http\Controllers\Gapoktan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\Poktan;
use Illuminate\Support\Facades\DB;
use App\Models\Farmer;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;

class HarvestController extends Controller
{
    // set index page view
	public function index() {
		return view('gapoktan.panen.index');
	}

    // handle fetch all eamployees ajax request
	public function fetchAll(Request $request) {
		// $emps = Poktan::with('user', 'gapoktan')->latest()->get();
        $emps = Plant::join('farmers', 'plants.farmer_id', '=', 'farmers.id')
                    ->join('poktans', 'plants.poktan_id', '=', 'poktans.id')
                    ->join('gapoktans', 'poktans.gapoktan_id', '=', 'gapoktans.id')
                    ->select('plants.*', 'surface_area as area')
                    ->where('gapoktans.user_id', '=', auth()->user()->id)
                    ->whereNotNull('plants.harvest_date')
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
                    $output .= '<td><div class="badge badge-warning">Tanam</div></td>';
                } else {
                    $output .= '<td><div class="badge badge-success">Panen</div></td>';
                }
                $output .= '<td>
                    <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editEmployeeModal"><i class="bi-eye h4"></i></a>
                </td>
            </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Tidak ada data Panen!</h1>';
		}
	}

    // handle edit an employee ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$emp = Plant::with('poktan', 'farmer')->where('id', $id)->first();
		return response()->json($emp);
	}
}
