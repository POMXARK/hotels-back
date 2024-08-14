<?php

namespace App\Checkers;

use App\Conditions\ConditionInterface;
use App\Models\Rule;
use App\Models\RuleCondition;

class RuleChecker
{
    private array $conditions = [
        'country' => \App\Conditions\CountryCondition::class,
        'city' => \App\Conditions\CityCondition::class,
        'tars' => \App\Conditions\StarsCondition::class,
        'discount_percent' => \App\Conditions\DiscountPercentCondition::class,
        'comission_percent' => \App\Conditions\ComissionPercentCondition::class,
        'is_default' => \App\Conditions\IsDefaultCondition::class,
        'company_id' => \App\Conditions\CompanyIdCondition::class,
        'is_black' => \App\Conditions\IsBlackCondition::class,
        'is_recomend' => \App\Conditions\IsRecomendCondition::class,
        'is_white' => \App\Conditions\IsWhiteCondition::class,
    ];

    public function check(Rule $rule, $hotel, $agency): bool
    {
        foreach ($rule->conditions as $condition) {
            $conditionClass = $this->conditions[$condition->condition_type];
            $conditionInstance = new $conditionClass($condition->operator, $condition->value);
            if (!$conditionInstance->check($hotel, $agency)) {
                return false;
            }
        }

        return true;
    }
}
