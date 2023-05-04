<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $User = User::orderBy('id', 'desc')->paginate(8);
        return UserResource::collection($User);
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
    public function show(User $User)
    {
        //
    }

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
     function search($User)
    {
        return User::where("fullName" ,'LIKE' , '%' . $User. '%')->orderBy('id', 'desc')->paginate(8);

    }
}