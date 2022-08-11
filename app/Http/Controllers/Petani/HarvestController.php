<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\Poktan;
use Illuminate\Support\Facades\DB;
use App\Models\Farmer;
use App\Models\FieldRecapHarvest;
use App\Models\FieldRecapPlanting;
use App\Models\Field;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;

class HarvestController extends Controller
{
    // set index page view
	public function index() {
		return view('petani.panen.index');
	}

    // handle fetch all eamployees ajax request
	public function fetchAll(Request $request) {
		// $emps = Poktan::with('user', 'gapoktan')->latest()->get();
        $emps = FieldRecapHarvest::join('field_recap_plantings', 'field_recap_harvests.planting_id', '=', 'field_recap_plantings.id')
                    ->join('farmers', 'field_recap_harvests.farmer_id', '=', 'farmers.id')
                    ->select('field_recap_harvests.*', 'farmers.user_id as name')
                    ->where('farmers.user_id', '=', auth()->user()->id)
                    ->orderBy('field_recap_harvests.updated_at', 'desc')
                    ->get();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table id="recapHarvest" class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Petani</th>
                <th>Lahan</th>
                <th>Tanggal Tandur</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>';
            $nomor=1;
			foreach ($emps as $emp) {
                $output .= '<tr>';
                $output .= '<td>' . $nomor++ . '</td>';
                $output .= '<td>' . $emp->farmer->user->name . '</td>';
                if ($emp->planting_id) {
                    $output .= '<td>
                        ' . $emp->fieldRecapPlanting->field->fieldCategory->name . ' (' . $emp->fieldRecapPlanting->field->fieldCategory->details . ')
                    </td>';
                } else {
                    $output .= '<td>
                        Tidak ada
                    </td>';
                }
                if ($emp->date_harvest) {
                    $output .= '<td>'. date("d-F-Y", strtotime($emp->date_harvest)) .'</td>';
                } else {
                    $output .= '<td><span class="text-danger">Belum diisi</span></td>';
                }
                if ($emp->status === 'belum selesai panen') {
                    $output .= '<td>
                        <a href="#" id="' . $emp->id . '" class="text-success mx-1 editPanen" data-toggle="modal" data-target="#editPanenModal"><i class="bi-pencil-square h4"></i></a>
                    </td>';
                } else {
                    $output .= '<td>
                        <i class="bi bi-check-circle h4"></i>
                    </td>';
                }
                $output .= '
            </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Tidak ada data Panen!</h1>';
		}
	}

    // handle edit an employee ajax request
	public function editPanen(Request $request) {
		$id = $request->id;
		$emp = FieldRecapHarvest::with('fieldRecapPlanting')->find($id);
		return response()->json($emp);
	}

    public function updatePanen(Request $request)
    {
        $planting = FieldRecapHarvest::find($request->emp_id)->update([
            'planting_id' => $request->plant_id,
            'farmer_id' => $request->farmer_id,
            'date_harvest' => Carbon::createFromFormat('d-M-Y', $request->date_harvest)->format('Y-m-d h:i:s'),
            'status' => $request->status,
        ]);

        $plant = Field::where('id', $request->field_id)->first();
        $plant->status = $request->status;
        $plant->save();

		return response()->json([
			'status' => 200,
		]);
	}

    public function fetchAllPlanting(Request $request)
    {
		// $emps = Poktan::with('user', 'gapoktan')->latest()->get();
        $emps = FieldRecapPlanting::join('fields', 'field_recap_plantings.field_id', '=', 'fields.id')
                    ->join('farmers', 'field_recap_plantings.farmer_id', '=', 'farmers.id')
                    ->select('field_recap_plantings.*', 'fields.farmer_id as name')
                    ->where('farmers.user_id', '=', auth()->user()->id)
                    ->where('field_recap_plantings.status', '!=', 'sudah panen')
                    ->where('field_recap_plantings.status', '!=', 'belum selesai panen')
                    ->orderBy('field_recap_plantings.updated_at', 'desc')
                    ->get();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table id="recapPlanting" class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Petani</th>
                <th>Lahan</th>
                <th>Tanggal Tandur</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>';
            $nomor=1;
			foreach ($emps as $emp) {
                $output .= '<tr>';
                $output .= '<td>' . $nomor++ . '</td>';
                $output .= '<td>' . $emp->farmer->user->name . '</td>';
                if ($emp->planting_id){
                    $output .= '<td>' . $emp->field->fieldCategory->name . ' (' . $emp->field->fieldCategory->details . ')</td>';
                } else {
                    $output .= '<td>Tidak ada</td>';
                }
                if ($emp->date_planting) {
                    $output .= '<td>'. date("d-F-Y", strtotime($emp->date_planting)) .'</td>';
                } else {
                    $output .= '<td><span class="text-danger">Belum diisi</span></td>';
                }
                $output .= '<td>
                    <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editEmployeeModal" data-dismiss="modal">Melakukan Panen</a>
                </td>
            </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Tidak ada data tandur!</h1>';
		}
	}

    // handle edit an employee ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$emp = FieldRecapPlanting::find($id);
		return response()->json($emp);
	}

    public function update(Request $request)
    {
        if ($request->status === 'panen') {
            $planting = FieldRecapHarvest::where('planting_id', $request->emp_id)->create([
                'planting_id' => $request->plant_id,
                'farmer_id' => $request->farmer_id,
                'date_harvest' => Carbon::createFromFormat('d-M-Y', $request->date_harvest)->format('Y-m-d h:i:s'),
                'status' => $request->status,
            ]);

            $plant = Field::find($request->field_id);
            $plant->status = $request->status;
            $plant->save();

            $planting = FieldRecapPlanting::find($request->field_id)->update([
                'status' => 'sudah panen',
            ]);
        } elseif($request->status === 'belum selesai panen') {
            $planting = FieldRecapHarvest::where('planting_id', $request->emp_id)->create([
                'planting_id' => $request->plant_id,
                'farmer_id' => $request->farmer_id,
                'date_harvest' => Carbon::createFromFormat('d-M-Y', $request->date_harvest)->format('Y-m-d h:i:s'),
                'status' => $request->status,
            ]);

            $plant = Field::find($request->field_id);
            $plant->status = $request->status;
            $plant->save();

            $planting = FieldRecapPlanting::find($request->field_id)->update([
                'status' => $request->status,
            ]);
        }

		return response()->json([
			'status' => 200,
		]);
	}

}
