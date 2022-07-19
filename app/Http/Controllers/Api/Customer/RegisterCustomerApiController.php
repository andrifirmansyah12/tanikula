<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Controllers\Api\BaseApiController as BaseController;
use App\Models\Costumer;
use Illuminate\Http\Request;
use Validator;

class RegisterCustomerApiController extends BaseController
{
    public function register(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     'c_password' => 'required|same:password',
        // ]);

        // if($validator->fails()){
        //     return $this->sendError('Validation Error.', $validator->errors());       
        // }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user->assignRole('pembeli');
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
        $datas = Costumer::create([
            'user_id' => $user->id,
        ]);

        return $this->sendResponse($success, 'User register successfully.');
    }
}
