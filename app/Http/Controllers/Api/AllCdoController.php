<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CdoResource;
use App\Models\Cdo;
use Illuminate\Http\Request;
use App\Http\Middleware\TokenMiddleware;

class AllCdoController extends Controller
{
    function __invoke()
    {
        $Cdo = Cdo::all();
        return CdoResource::collection($Cdo);
    }

}
