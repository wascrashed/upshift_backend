<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Resources\RoleResource;

class RoleController extends Controller
{

    public function index()
    {
        $role = Role::orderBy('id', 'desc')->paginate(8);

        return RoleResource::collection($role);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $role = Role::create($request->all());
        return new RoleResource($role);
    }

    public function show(Role $role)
    {
        //
    }

    public function edit(Role $role)
    {
        //
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        return new RoleResource($role);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response(null , 204);
    }
    function search($role)
    {
        return Role::where("name" ,'LIKE' , '%' . $role. '%')->orderBy('id', 'desc')->paginate(8);

    }
}
