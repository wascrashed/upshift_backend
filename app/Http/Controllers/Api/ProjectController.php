<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;

class ProjectController extends Controller
{
    public function index()
    {

        $project = Project::orderBy('id', 'desc')->paginate(8);
        return ProjectResource::collection($project);
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $project =Project::create($request->all());
        return new ProjectResource($project);
    }


    public function show(Project $project)
    {
        //
    }

    public function edit(Project $project)
    {
        //
    }


    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return new ProjectResource($project);
    }


    public function destroy(ProjectЫ $project)
    {
        $project->delete();
        return response(null , 204);
    }
    function search($project)
    {
        return Project::where("title" ,'LIKE' , '%' . $project. '%')->orderBy('id', 'desc')->paginate(8);

    }
}
