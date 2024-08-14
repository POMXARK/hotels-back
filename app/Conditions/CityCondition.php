<?php

namespace App\Conditions;

class CityCondition implements ConditionInterface
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
        if ($this->operator === 'eq') {
            return $hotel->city->id === (int) $this->value;
        } elseif ($this->operator === 'neq') {
            return $hotel->city->id!== (int) $this->value;
        }

        return false;
    }
}
