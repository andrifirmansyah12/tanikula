<?php

namespace App\Http\Controllers\Api\Gapoktan;

use App\Http\Controllers\Controller;
use App\Http\Resources\Gapoktan\EducationResource;
use App\Models\Education;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EducationApiController extends Controller
{
    public function index()
    {
        $data = Education::latest()->get();
        return response()->json([EducationResource::collection($data), 'Data fetched.']);
    }
 
    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(),[
            // 'user_id' => 'required',
            'category_education_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            // 'date' => 'required',
            'file' => 'required',
            // 'name' => 'required|string|max:255',
            'desc' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $datas = Education::create([
            'user_id' => $request->user_id,
            'category_education_id' => $request->category_education_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'date' => $request->date,
            'file' => $request->file,
            'desc' => $request->desc,
         ]);
        
        return response()->json(['Data created successfully.', new EducationResource($datas)]);
    }

   
    public function show($id)
    {
        $data = Education::find($id);
        if (is_null($data)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new EducationResource($data)]);
    }

   
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
         $validator = Validator::make($request->all(),[
              // 'user_id' => 'required',
            'category_education_id' => 'required',
            'title' => 'required',
            // 'slug' => 'required',
            // 'date' => 'required',
            'file' => 'required',
            // 'name' => 'required|string|max:255',
            'desc' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $data = Education::findOrFail($id);

        $data->update([
            'user_id' => $request->user_id,
            'category_education_id' => $request->category_education_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'date' => $request->date,
            'file' => $request->file,
            'desc' => $request->desc,
            // 'slug' => Str::slug($request->title)
        ]);
       
        $data->update();
        
        return response()->json(['Data updated successfully.', new EducationResource($data)]);
    }
 
    public function destroy($id)
    {
        $data = Education::findOrFail($id);
        $data->delete();

        return response()->json('Program deleted successfully');
    }
}
