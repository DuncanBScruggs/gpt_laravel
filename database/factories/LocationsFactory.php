<?php

namespace Database\Factories;

use App\Models\Locations;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationsFactory extends Factory {

    protected $model = Locations::class;

    public function definition()
    {
    return [
        'location' => $this->faker->text(10),
        'ref_game_id' => 2,
    ];
}};
