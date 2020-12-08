<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locations;

class LocationsController extends Controller
{
    public function locationsIndex()
    {
        return Locations::all();
    }

    public function gameLocationsIndex($game_id)
    {
        return Locations::where('ref_game_id', $game_id)->get();
    }

    public function createLocation(Request $request)
    {

        $location = new Locations;
        $location->location = request('location');
        $location->ref_game_id = request('ref_game_id');

        $location->save();
    }

    public function deleteLocation(Request $request)
    {
        Locations::find($request->id)->delete();
    }
}
