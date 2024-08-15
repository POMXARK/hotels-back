<?php

namespace App\Listeners;

use App\Events\CheckHotelRules;
use App\Messages\HotelRuleNotification;
use App\Models\Agency;
use App\Models\Rule;

class CheckHotelRulesListener
{
    /**
     * Handle the event.
     *
     * @param  CheckHotelRules  $event
     * @return void
     */
    public function handle(CheckHotelRules $event)
    {
        // Если правило сработало, отправляем уведомление менеджеру
        $this->sendNotification($event->agency, $event->rule);
    }

    /**
     * Отправляет уведомление менеджеру.
     *
     * @param  Agency  $agency
     * @param  Rule  $rule
     * @return void
     */
    private function sendNotification(Agency $agency, Rule $rule)
    {
        $agency->notify(new HotelRuleNotification($agency, $rule));
    }
}
