<?php

namespace App\Http\Controllers;

use App\Models\CharacterTask;
use App\Models\Locations;
use Illuminate\Http\Request;

class CharacterTasksController extends Controller
{
    public function Index()
    {
        return CharacterTask::all();
    }

    public function createCharacterTask(Request $request)
    {
        $charactertask = new CharacterTask;
        $charactertask->ref_character_id = request('ref_character_id');
        $charactertask->ref_task_id = request('ref_task_id');
        $charactertask->save();
        return Locations::where('ref_game_id', request('ref_game_id'))->get();
    }
    public function deleteCharacterTask(Request $request)
    {
        CharacterTask::destroy($request->id);
        return Locations::where('ref_game_id', request('ref_game_id'))->get();
    }
}
