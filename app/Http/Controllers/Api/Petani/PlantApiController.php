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

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
        'name' => 'required',
             
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $datas = Plant::create([
            'id' => $request->id,
            'user_id' => $request->user_id,
            "plant_tanaman" => $request->plant_tanaman,
            'surface_area' => $request->surface_area,
            'plating_date' => $request->plating_date,
            'harvest_date' => $request->harvest_date,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);
 
        return $this->sendResponse($datas, 'Data Strored');
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
        //
    }

    public function destroy($id)
    {
        $data = Plant::findOrFail($id);
        $data->delete();

        return $this->sendResponse($data, 'Data deleted');
    }
}
