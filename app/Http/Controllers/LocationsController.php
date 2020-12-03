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
