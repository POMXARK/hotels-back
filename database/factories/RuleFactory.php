<?php

namespace Database\Factories;

use App\Models\Agency;
use App\Models\Rule;
use Illuminate\Database\Eloquent\Factories\Factory;

class RuleFactory extends Factory
{
    protected $model = Rule::class;

    public function definition()
    {
        return [
            'agency_id' => Agency::factory(),
            'name' => $this->faker->word(),
            'text_for_manager' => $this->faker->text(),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
