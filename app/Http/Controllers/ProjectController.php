<?php

namespace Lifequest\app\Http\Controllers;

use Illuminate\Http\Request;
use Lifequest\app\Model\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_completed', false)
            ->orderBy('created_at', 'desc')
            ->withCount(['quests' => function ($query) {
                $query->where('is_completed', false);
            }])
            ->get();

        return $projects->toJson();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $project = Project::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        return response()->json('Project created!');
    }

    public function show($id)
    {
        $project = Project::with(['quests' => function ($query) {
            $query->where('is_completed', false);
        }])->find($id);

        return $project->toJson();
    }

    public function markAsCompleted(Project $project)
    {
        $project->is_completed = true;
        $project->update();

        return response()->json('Project updated!');
    }
}
