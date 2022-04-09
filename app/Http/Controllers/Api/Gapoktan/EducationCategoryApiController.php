<?php

namespace App\Http\Controllers\Api\Gapoktan;

use App\Http\Controllers\Controller;
use App\Http\Resources\Gapoktan\EducationCategoryResource;
use App\Models\EducationCategory;
use Illuminate\Http\Request;

class EducationCategoryApiController extends Controller
{
   public function index()
    {
        // print("response");
        $data = EducationCategory::latest()->get();
        return response()->json([EducationCategoryResource::collection($data), 'Data fetched.']);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
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
        //
    }
}
