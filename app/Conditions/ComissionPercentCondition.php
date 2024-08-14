<?php

namespace App\Conditions;

class ComissionPercentCondition implements ConditionInterface
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

        if ($this->operator === 'eq') {
            return $agreement->comission_percent === (int) $this->value;
        } elseif ($this->operator === 'neq') {
            return $agreement->comission_percent!== (int) $this->value;
        } elseif ($this->operator === 'gt') {
            return $agreement->comission_percent > (int) $this->value;
        } elseif ($this->operator === 'lt') {
            return $agreement->comission_percent < (int) $this->value;
        }

        return false;
    }
}
