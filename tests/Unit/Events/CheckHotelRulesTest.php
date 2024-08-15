<?php

namespace Tests\Unit\Events;

use App\Events\CheckHotelRules;
use App\Models\Agency;
use App\Models\Rule;
use PHPUnit\Framework\TestCase;

class CheckHotelRulesTest extends TestCase
{
    public function test_event_has_required_properties()
    {
        $hotelId = 1;
        $agency = new Agency();
        $rule = new Rule();

        $event = new CheckHotelRules($hotelId, $agency, $rule);

        $this->assertEquals($hotelId, $event->hotelId);
        $this->assertEquals($agency, $event->agency);
        $this->assertEquals($rule, $event->rule);
    }
}
