<?php

namespace Lifequest\app\Http\Controllers;

use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lifequest\app\Model\Project;

/**
 * Class ProjectController
 * @package Lifequest\app\Http\Controllers
 */
class ProjectController extends Controller
{
    /**
     * @return string
     */
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

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Project::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        return response()->json('Project created!');
    }

    /**
     * @param $id
     * @return string
     * @throws JsonEncodingException
     */

    public function show($id)
    {
        $project = Project::with(['quests' => function ($query) {
            $query->where('is_completed', false);
        }])->find($id);

        return $project->toJson();
    }
    /**
     * @param Project $project
     * @return JsonResponse
     */
    public function markAsCompleted(Project $project)
    {
        $project->is_completed = true;
        $project->update();

        return response()->json('Project updated!');
    }
}
