<?php

namespace Lifequest\app\Http\Controllers;

use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lifequest\app\Model\Quest;

/**
 * Class QuestController
 * @package Lifequest\app\Http\Controllers
 */
class QuestController extends Controller
{
    /**
     * @param Request $request
     * @return string
     * @throws JsonEncodingException
     */
    public function store(Request $request)
    {
        /** @var TYPE_NAME $validatedData */
        $validatedData = $request->validate(['title' => 'required']);

        $quest = Quest::create([
            'title' => $validatedData['title'],
            'project_id' => $request->project_id,
        ]);

        return $quest->toJson();
    }

    /**
     * @param Quest $task
     * @return JsonResponse
     */
    public function markAsCompleted(Quest $task)
    {
        $task->is_completed = true;
        $task->update();

        return response()->json('Quest updated!');
    }
}
