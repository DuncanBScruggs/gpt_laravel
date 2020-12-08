<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Characters;

class CharactersController extends Controller
{
    public function charactersIndex()
    {
        return Characters::all();
    }

    public function userCharactersIndex(Request $request)
    {
        $user = $request->user();
        $game_id = request('ref_game_id');
        return Characters::where('ref_user_id', $user->id)->where('ref_game_id', $game_id)->get();
    }

    public function createCharacter(Request $request)
    {
        $user = $request->user();
        $character = new Characters;
        $character->name = request('name');
        $character->ref_user_id = $user->id;
        $game_id = request('ref_game_id');
        $character->ref_game_id = $game_id;

        $character->save();
        return Characters::where('ref_user_id', $user->id)->where('ref_game_id', $game_id)->get();
    }

    public function deleteCharacter(Request $request)
    {
        Characters::find($request->id)->delete();
    }
}
