<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Files;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\ProjectResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /// show all
    public function index()
    {
        $project = Project::orderBy('id', 'desc')->paginate(8);
        return ProjectResource::collection($project);
    }

    ////create
        public function store(Request $request)
    {
        // Добавление проекта
        $project = new Project();
        $project->fill($request->all());

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos');
            $project->imagePath = $path;
        }

        $project->save();

        // Добавление файлов
        $files = $request->file('files');

        if ($files) {
            foreach ($files as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);
                $url = asset('uploads/' . $filename);

                // Создаем запись в базе данных
                $file = new Files([
                    'fileName' => $filename,
                    'url' => $url
                ]);
                $project->files()->save($file);
            }
        }

    return response()->json(['message' => 'Project created successfully!', 'project' => $project], 201);
}
    public function show($id)
    {
    $project = Project::find($id);
    if ($project) {
        $files = $project->files()->get();
        $fileUrls = [];
        foreach ($files as $file) {
            $fileUrls[] = $file->url;
        }
        return response()->json(['project' => new ProjectResource($project), 'files' => $fileUrls], 200);
    }
    return response()->json(['message' => 'Project not found'], 404);
    }

        public function edit(Project $project)
        {
            //
        }

        public function update(StoreProjectRequest $request, Project $project)
        {
            $project->fill($request->all());
            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('photos');
                $project->imagePath = $path;
            }

            $project->files()->delete();

            $files = $request->file('files');

            if ($files) {
                foreach ($files as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads'), $filename);
                    $url = asset('uploads/' . $filename);

                    // Создаем запись в базе данных
                    $file = new Files([
                        'fileName' => $filename,
                        'url' => $url
                    ]);
                    $project->files()->save($file);
                }
            }

            $project->save();

            return response()->json(['message' => 'Project updated successfully!', 'project' => $project], 200);
        }
        public function destroy(Project $project)
        {
            $project->delete();

            return response(null, 204);
        }
}
