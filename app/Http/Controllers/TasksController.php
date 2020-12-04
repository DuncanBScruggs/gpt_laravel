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

    public function createtask(Request $request)
    {

        $task = new Tasks;
        $task->task = request('task');
        $task->ref_game_id = request('ref_game_id');

        $task->save();
    }

    public function deletetask(Request $request)
    {
        Tasks::find($request->id)->delete();
    }
}
