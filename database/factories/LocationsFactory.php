<?php

namespace Database\Factories;

use App\Models\Locations;
use App\Models\Games;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationsFactory extends Factory {

    protected $model = Locations::class;

    public function definition()
    {
        $games = Games::all()->pluck('id')->toArray();

    return [
        'location' => $this->faker->text(10),
        'ref_game_id' => $this->faker->randomElement($games),
    ];
}};
