<?php

namespace App\Http\Controllers\Api\Gapoktan;

use App\Http\Controllers\Controller;
use App\Http\Resources\Gapoktan\EducationResource;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationApiController extends Controller
{
    public function index()
    {
        $data = Education::latest()->get();
        return response()->json([EducationResource::collection($data), 'Education fetched.']);
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
