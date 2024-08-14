<?php

namespace Database\Factories;

namespace Database\Factories;

use App\Models\RuleCondition;
use App\Models\SqlQuery;
use Illuminate\Database\Eloquent\Factories\Factory;

class RuleConditionFactory extends Factory
{
    protected $model = RuleCondition::class;

    public function definition()
    {
        return [
            'rule_id' => $this->faker->numberBetween(1, 10),
            'sql_query_id' => $this->faker->numberBetween(1, SqlQuery::query()->count()),
        ];
    }
}
