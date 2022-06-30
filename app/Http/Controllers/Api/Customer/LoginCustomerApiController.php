<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\BaseApiController as BaseController;
use App\Models\Costumer;

class LoginCustomerApiController  extends BaseController
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $customer_id =   Costumer::where('user_id', $user->id)->first();
            $success['token'] =  $user->createToken('MyApp')->accessToken; 
            $success['id'] =  $user->id;
            $success['email'] =  $user->email;
            $success['name'] =  $user->name;
            $success['customer_id'] =  $customer_id->id;
            $success['hasRole'] =  $user->hasRole('pembeli');

            if ($success['hasRole'] == 'pembeli') {
                return $this->sendResponse($success, 'User login successfully.');
            } else {
                return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
            }
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
}
