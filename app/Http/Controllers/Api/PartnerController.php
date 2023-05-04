<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerResource;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partner = Partner::orderBy('id', 'desc')->paginate(8);
        return PartnerResource::collection($partner);
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
        $partners = Partner::create($request->all());
        return new PartnerResource($partners);
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $partner->update($request->all());
        return new PartnerResource($partner);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return response(null ,204);
    }
     function search($partner)
    {
        return Partner::where("name" ,'LIKE' , '%' . $partner. '%')->orderBy('id', 'desc')->paginate(8);

    }
}
