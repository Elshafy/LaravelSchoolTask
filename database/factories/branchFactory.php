<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->randomLetter(),
            "num_student" => 20,
            "section_id" => 1,
            "school_id" => 1,
            "teacher_id" => 1
        ];
    }
}
