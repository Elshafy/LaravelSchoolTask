<?php

namespace Database\Factories;

use App\Models\teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    protected $model = teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'idnum' => $this->faker->unique()->numberBetween(10000,),
            'filenum' => $this->faker->numberBetween(),
            'tele' => $this->faker->numberBetween(),
            'specialized' => $this->faker->name(),
            'position_id' => 2,
            'school_id' => 1,
            'added' => now(),
            'address' => $this->faker->address(),
        ];
    }
}
