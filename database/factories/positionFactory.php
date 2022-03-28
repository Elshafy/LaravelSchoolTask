<?php

namespace Database\Factories;

use App\Models\position;
use Illuminate\Database\Eloquent\Factories\Factory;

class PositionFactory extends Factory
{
    protected $model = position::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'مدرس ا',
            'status' => 0
        ];
    }
}
