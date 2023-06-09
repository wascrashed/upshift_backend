<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = User::orderBy('id', 'desc')->paginate(8);
        return UserResource::collection($user);

    }

    public function show($api_token)
    {
        $user = User::where('api_token', $api_token)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $User =User::create($request->all());
        return new UserResource($User);
    }

    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $User)
    {
        $User->update([
            'fullName' => $request->fullName,
            'phoneNumber' => $request->phoneNumber,
            'cdo_id' => $request->cdo_id,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'address'=> $request->address,
        ]);
        return new UserResource($User);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $User)
    {
        $User->delete();
        return response(null , 204);
    }
     function search($user)
    {
        $result = User::where("fullName" ,'LIKE' , '%' . $user. '%')->orderBy('id', 'desc')->paginate(8);
        return UserResource::collection($result);

    }
}
