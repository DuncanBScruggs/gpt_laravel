<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Games;

class GamesController extends Controller
{
    public function gamesIndex()
    {
        return Games::all();
    }

    public function createGame(Request $request)
    {

        $game = new Games;
        $game->name = request('name');
        $game->image = request('image');

        $game->save();
    }

    public function deleteGame(Request $request)
    {
        Games::find($request->id)->delete();
    }
}
