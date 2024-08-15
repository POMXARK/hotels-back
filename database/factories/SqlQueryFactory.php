<?php

namespace Database\Factories;

use App\Models\SqlQuery;
use Illuminate\Database\Eloquent\Factories\Factory;

class SqlQueryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SqlQuery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'select' => $this->faker->sentence(),
            'where' => $this->faker->sentence(),
        ];
    }
}
