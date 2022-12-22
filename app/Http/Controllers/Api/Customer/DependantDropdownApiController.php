<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class DependantDropdownApiController extends Controller
{
    public function provinces()
    {
        return \Indonesia::allProvinces();
    }

    public function cities(Request $request)
    {
        return \Indonesia::findProvince($request->id, ['cities']);
    }

    public function districts(Request $request)
    {
        return \Indonesia::findCity($request->id, ['districts']);
    }

    public function villages(Request $request)
    {
        return \Indonesia::findDistrict($request->id, ['villages']);
    }

    //function untuk load select dependant
    public function getCitiesAjax($id)
    {
        $cities = City::where('province_id', '=', $id)->pluck('city_name', 'id');

        return json_encode($cities);
    }
}
