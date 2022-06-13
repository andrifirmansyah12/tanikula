<?php

namespace App\Http\Controllers\Api\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseApiController as BaseController;
use App\Http\Resources\PlantResource;
use App\Models\Plant;
use Illuminate\Support\Facades\Validator;


class PlantApiController extends BaseController
{
    public function index()
    {
        $datas = Plant::latest()->get();
        $result = PlantResource::collection($datas);
        return $this->sendResponse($result, 'Data fetched');
    }

    public function indexByIdUser($id)
    {
        $datas = Plant::where('farmer_id', $id)->latest()->get();
        $result = PlantResource::collection($datas);
        return $this->sendResponse($result, 'Data fetched');
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'plant_tanaman' => 'required',
            'surface_area' => 'required',
            'address' => 'required',
            'plating_date' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $datas = Plant::create([
            'id' => $request->id,
            'farmer_id' => $request->farmer_id,
            'poktan_id' => $request->poktan_id,
            "plant_tanaman" => $request->plant_tanaman,
            'surface_area' => $request->surface_area,
            'address' => $request->address,
            'plating_date' => $request->plating_date,
            'harvest_date' => $request->harvest_date,
            'status' => "tandur",
        ]);
        $result = PlantResource::make($datas);
        return $this->sendResponse($result, 'Data Strored');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'plant_tanaman' => 'required',
            'surface_area' => 'required',
            'plating_date' => 'required',
            'address' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $datas = Plant::findOrFail($id);

        $datas->update([
            "plant_tanaman" => $request->plant_tanaman,
            'surface_area' => $request->surface_area,
            'address' => $request->address,
            'plating_date' => $request->plating_date, 
            'harvest_date' => $request->harvest_date, 
        ]);

        $datas->update();

        return $this->sendResponse($datas, 'Data Updated');

    }

    public function addHarvestDate(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'harvest_date' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $datas = Plant::findOrFail($id);

        $datas->update([
            'harvest_date' => $request->harvest_date, 
            'status' => "panen",
        ]);

        $datas->update();

        return $this->sendResponse($datas, 'Data Updated');

    }

    public function updateStatus($id)
    {
        $datas = Plant::findOrFail($id);

        $datas->update([
            'status' => "selesai",
        ]);

        $datas->update();

        return $this->sendResponse($datas, 'Data Updated');

    }

    public function destroy($id)
    {
        $data = Plant::findOrFail($id);
        $data->delete();

        return $this->sendResponse($data, 'Data deleted');
    }
}
