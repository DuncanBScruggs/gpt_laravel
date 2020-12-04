<?php

namespace Database\Factories;

use App\Models\Games;
use Illuminate\Database\Eloquent\Factories\Factory;

class GamesFactory extends Factory {

    protected $model = Games::class;

    public function definition()
    {
    return [
        'name' => $this->faker->text(10),
        'image' => $this->faker->imageUrl($width = 640, $height = 480) // 'http://lorempixel.com/640/480/',
    ];
}};
