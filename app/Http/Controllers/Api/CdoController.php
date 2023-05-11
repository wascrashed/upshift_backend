<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CdoResource;
use App\Models\Cdo;
use Hamcrest\Arrays\IsArrayContainingInAnyOrderTest;
use Illuminate\Http\Request;

class CdoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $Cdo = Cdo::orderBy('id', 'desc')->paginate(8);

        return CdoResource::collection($Cdo);
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
        $Cdo = Cdo::create($request->all());
        return new CdoResource($Cdo);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cdo $Cdo) 
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cdo $Cdo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cdo $Cdo)
    {
        $Cdo->update($request->all());
        return new CdoResource($Cdo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cdo $Cdo)
    {
        $Cdo->delete();
        return response(null , 204);
    }
    function search($Cdo)
    {
        return Cdo::where("name" ,'LIKE' , '%' . $Cdo. '%')->orderBy('id', 'desc')->paginate(8);

    }

}
