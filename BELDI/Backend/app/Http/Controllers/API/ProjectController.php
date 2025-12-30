<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\Project\ProjectRequest;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::with('category')->get();
    }

    public function store(ProjectRequest $request)
    {
        $this->authorize('create', Project::class);
        return Project::create($request->validated());
    }

    public function show(Project $project)
    {
        $this->authorize('view', $project);
        return $project->load('category');
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);
        $project->update($request->validated());
        return $project;
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);
        $project->delete();
        return response()->noContent();
    }
}

