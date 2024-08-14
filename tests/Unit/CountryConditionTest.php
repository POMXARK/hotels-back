<?php

namespace Tests\Unit;

use App\Conditions\CountryCondition;
use App\Models\Rule;
use PHPUnit\Framework\TestCase;

class CountryConditionTest extends TestCase
{
    public function test_country_condition_checks_hotel_country()
    {
        $condition = new CountryCondition('eq', '1');
        $hotel = new \App\Models\Hotel();
        $hotel->country_id = 1;
        $agent = new \App\Models\Agency();

        $this->assertTrue($condition->check($hotel, $agent));
    }
}
