<?php

namespace Lifequest\app\Http\Controllers;

use Lifequest\app\Model\Quest;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate(['title' => 'required']);

        $quest = Quest::create([
            'title' => $validatedData['title'],
            'project_id' => $request->project_id,
        ]);

        return $quest->toJson();
    }

    public function markAsCompleted(Quest $task)
    {
        $task->is_completed = true;
        $task->update();

        return response()->json('Quest updated!');
    }
}
