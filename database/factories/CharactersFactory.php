<?php

namespace Database\Factories;

use App\Models\Characters;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharactersFactory extends Factory {

    protected $model = Characters::class;

    public function definition()
    {
    return [
        'name' => $this->faker->text(10),
    ];
}};
