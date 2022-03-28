<?php

namespace Database\Factories;

use App\Models\school;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    protected $model = school::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'rigion' => $this->faker->name(),
            'guide_name' => $this->faker->name(),
            'guide_tele' => $this->faker->numberBetween(1000),
            'mod_name' => $this->faker->name(),
            'mod_tele' => $this->faker->numberBetween(1000),
            'num_11' => 5,
            'num_12' => 5,
            'num_teacher' => 5,
            'address' => $this->faker->address(),

        ];
    }
}
