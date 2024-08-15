<?php

namespace Tests\Unit\Messages;

use App\Messages\HotelRuleNotification;
use App\Models\Agency;
use App\Models\Rule;
use PHPUnit\Framework\TestCase;

class HotelRuleNotificationTest extends TestCase
{
    public function test_to_array_method_returns_array()
    {
        $agency = new Agency();
        $rule = new Rule();

        $notification = new HotelRuleNotification($agency, $rule);

        $array = $notification->toArray(new \Illuminate\Notifications\AnonymousNotifiable());

        $this->assertIsArray($array);
    }
}
