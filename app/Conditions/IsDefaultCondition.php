<?php

namespace App\Conditions;

class IsDefaultCondition implements ConditionInterface
{
    private $operator;
    private $value;

    public function __construct($operator, $value)
    {
        $this->operator = $operator;
        $this->value = $value;
    }

    public function check($hotel, $agency): bool
    {
        $agreement = $hotel->agreements()->where('agency_id', $agency->id)->first();
        if (!$agreement) {
            return false;
        }

        return $agreement->is_default === (bool) $this->value;
    }
}
