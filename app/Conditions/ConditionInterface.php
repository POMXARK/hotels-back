<?php

namespace App\Conditions;

interface ConditionInterface
{
    public function check($hotel, $agency): bool;
}
