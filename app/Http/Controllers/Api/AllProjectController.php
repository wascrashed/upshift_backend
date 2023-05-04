<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class AllProjectController extends Controller
{
    function __invoke()
    {
        $Project = Project::all();
        return ProjectResource::collection($Project);
    }

}
