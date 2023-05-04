<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerResource;
use App\Models\Partner;
use Illuminate\Http\Request;

class AllPartnerController extends Controller
{
    function __invoke()
    {
        $Partner = Partner::all();
        return PartnerResource::collection($Partner);
    }

}
