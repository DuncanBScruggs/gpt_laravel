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

    public function userCharactersIndex()
    {
        return Characters::where('ref_user_id')->get();
    }

    public function createCharacter(Request $request)
    {
        $user = $request->user();
        $character = new Characters;
        $character->name = request('name');
        $character->ref_user_id = $user->id;
        $character->ref_game_id = request('ref_game_id');

        $character->save();
        return $character;
    }

    public function deleteCharacter(Request $request)
    {
        Characters::find($request->id)->delete();
    }
}
