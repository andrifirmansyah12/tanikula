<?php

namespace App\Http\Controllers\Api\Gapoktan;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Resources\Gapoktan\ActivityResource;
use Illuminate\Support\Str;
use App\Models\Activity;
use Carbon\Carbon;
use Database\Seeders\ActivitySeeder;
use Illuminate\Http\Request;

class ActivityApiController extends Controller
{
    public function index()
    {
        $data = Activity::latest()->get();
        return response()->json([ActivityResource::collection($data), 'Data fetched.']);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'category_activity_id' => 'required',
            'title' => 'required',
            'desc' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $datas = Activity::create([
            'user_id' => $request->user_id,
            'category_activity_id' => $request->category_activity_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'date' => Carbon::now()->format('Y-m-d'),
            'desc' => $request->desc,
         ]);

        return response()->json(['Data created successfully.', new ActivityResource($datas)]);
    }


    public function show($id)
    {
        $data = Activity::find($id);
        if (is_null($data)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new ActivityResource($data)]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'category_activity_id' => 'required',
            'title' => 'required',
            'desc' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $datas = Activity::findOrFail($id);

        $datas->update([
            'user_id' => $request->user_id,
            'category_activity_id' => $request->category_activity_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'desc' => $request->desc,
        ]);

        $datas->update();

        return response()->json(['Data updated successfully.', new ActivityResource($datas)]);
    }

    public function destroy($id)
    {
        $data = Activity::findOrFail($id);
        $data->delete();

        return response()->json('Data deleted successfully');
    }

    public function search($name)
    {

        $datas = Activity::where('title', 'LIKE', '%'. $name. '%')->get();
        if(count($datas)){
            // return Response()->json($datas);
            return response()->json(['Data Found.', new ActivityResource($datas)]);
        }
        else
        {
            return response()->json(['Result' => 'No Data not found'], 404);
      }
    }
}
