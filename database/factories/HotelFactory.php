<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    protected $model = Hotel::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'stars' => $this->faker->numberBetween(1, 5),
            'city_id' => City::factory(),
        ];
    }
}
