<?php

namespace Database\Factories;

use App\Models\Agency;
use App\Models\AgencyHotelOption;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgencyHotelOptionFactory extends Factory
{
    protected $model = AgencyHotelOption::class;

    public function definition()
    {
        return [
            'hotel_id' => Hotel::factory(),
            'agency_id' => Agency::factory(),
            'percent' => $this->faker->numberBetween(1, 100),
            'is_black' => $this->faker->boolean,
            'is_recomend' => $this->faker->boolean,
            'is_white' => $this->faker->boolean,
        ];
    }
}
