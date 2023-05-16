<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(),
                [
                    'fullName' => 'required',
                    'phoneNumber' => ['required ', 'unique:users'],
                    'cdo_id' => 'required',
                    'role' => 'required',
                    'password' => 'required',
                    'address'=> 'required',
                ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 409);
            }

            $user = User::create([
                'fullName' => $request->fullName    ,
                'phoneNumber' => $request->phoneNumber,
                'cdo_id' => $request->cdo_id,
                'role' => $request->role,
                'password' => Hash::make($request->password),
                'address'=> $request->address,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {

            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 401);
        }
    }

}
