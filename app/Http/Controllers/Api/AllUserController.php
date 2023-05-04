<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class AllUserController extends Controller
{
    function __invoke()
    {
        $User = User::all();
        return UserResource::collection($User);
    }

}
