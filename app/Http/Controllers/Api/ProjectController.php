<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\ProjectResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /// show all
    public function index()
    {
        $project = Project::all();
        return ProjectResource::collection($project);
    }

    ////create
    public function store(Request $request)
    {
        $project = new Project();
        $project->fill($request->all());

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos');
            $project->imagePath = $path;
        }

        $project->save();
        return response()->json(['message' => 'Project created successfully!', 'project' => $project], 201);

    }

        public function show($id)
        {
            $photo = Project::find($id);
            if ($photo) {
                return response()->json(['path' => $photo->imagePath], 200);
            }
            return response()->json(['message' => 'Photo not found'], 404);
        }
        public function edit(Project $project)
        {
            //
        }

        public function update(StoreProjectRequest $request, Project $project)
        {
            $project->update($request->all());

            return new ProjectResource($project);
        }

        public function destroy(Project $project)
        {
            $project->delete();

            return response(null, 204);
        }
}
