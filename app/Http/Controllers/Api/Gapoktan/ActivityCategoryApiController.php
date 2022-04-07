<?php

namespace App\Http\Controllers\Api\Gapoktan;

use App\Http\Controllers\Controller;
use App\Http\Resources\Gapoktan\ActivityCategoryResource;
use App\Models\ActivityCategory;
use Illuminate\Http\Request;

class ActivityCategoryApiController extends Controller
{
    public function index()
    {
        $data = ActivityCategory::latest()->get();
        return response()->json([ActivityCategoryResource::collection($data), 'Data fetched.']);
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
