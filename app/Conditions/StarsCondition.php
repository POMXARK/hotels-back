<?php

namespace App\Conditions;

class StarsCondition implements ConditionInterface
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
            return $hotel->stars === (int) $this->value;
        } elseif ($this->operator === 'neq') {
            return $hotel->stars!== (int) $this->value;
        }

        return false;
    }
}
