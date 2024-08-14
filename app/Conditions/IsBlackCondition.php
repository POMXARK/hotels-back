<?php

namespace App\Conditions;

class IsBlackCondition implements ConditionInterface
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
        $option = $hotel->options()->where('agency_id', $agency->id)->first();
        if (!$option) {
            return false;
        }

        return $option->is_black === (bool) $this->value;
    }
}
