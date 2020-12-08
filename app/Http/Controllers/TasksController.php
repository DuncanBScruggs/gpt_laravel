<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TasksController extends Controller
{
    public function TasksIndex()
    {
        return Tasks::all();
    }

    public function locationTasksIndex($location_id)
    {
        return Tasks::where('ref_location_id', $location_id)->get();
    }

    public function createTask(Request $request)
    {
        $user = $request->user();
        $task = new Tasks;
        $task->task = request('task');
        $task->ref_game_id = request('ref_location_id');

        $task->save();
        return Tasks::where('ref_game_id', request('ref_game_id'))->get();
    }

    public function updateTask(Request $request)
    {

        $user = $request->user();
        $task = Tasks::findOrFail(request('task_id'));
        $task->status = request('status');
        $task->ref_game_id = request('ref_location_id');

        $task->save();
        return Tasks::where('ref_game_id', request('ref_game_id'))->get();
    }
    

    public function deletetask(Request $request)
    {
        Tasks::find($request->id)->delete();
    }
}
