<?php

namespace Database\Factories;

use App\Models\Tasks;
use App\Models\Locations;
use Illuminate\Database\Eloquent\Factories\Factory;

class TasksFactory extends Factory
{

    protected $model = Tasks::class;

    public function definition()
    {
        $locations = Locations::all()->pluck('id')->toArray();
        return [
            'name' => $this->faker->text(10),
            'ref_location_id' => $this->faker->randomElement($locations),
            'status' => 0,
        ];
    }
};
