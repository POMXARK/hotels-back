<?php

namespace App\Conditions;

class CompanyIdCondition implements ConditionInterface
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
            return $agreement->company_id === (int) $this->value;
        } elseif ($this->operator === 'neq') {
            return $agreement->company_id!== (int) $this->value;
        }

        return false;
    }
}
