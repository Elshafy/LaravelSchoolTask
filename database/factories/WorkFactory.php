<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'period_id'=>1,
            'branch_id'=>1,
            'school_id'=>1,
            'section_id'=>1,


            //
        ];
    }
}
