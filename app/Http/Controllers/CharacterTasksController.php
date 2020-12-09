<?php

namespace App\Http\Controllers;

use App\Models\CharacterTask;
use Illuminate\Http\Request;

class CharacterTasksController extends Controller
{
    public function Index()
    {
        return CharacterTask::all();
    }

    public function getCharacterTaskIndex($location_id, $character_id)
    {
        return CharacterTask::where('ref_location_id', $location_id)->where('ref_character_id', $character_id)->get();
    }

    public function createCharacterTask(Request $request)
    {
        $charactertask = new CharacterTask;
        $charactertask->ref_character_id = request('ref_character_id');
        $charactertask->ref_task_id = request('ref_task_id');

        $charactertask->save();
    }

    public function deleteCharacterTask(Request $request)
    {
        CharacterTask::find($request->id)->delete();
    }
}
