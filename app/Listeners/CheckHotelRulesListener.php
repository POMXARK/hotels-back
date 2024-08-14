<?php

namespace App\Listeners;

use App\Events\CheckHotelRules;
use App\Messages\HotelRuleNotification;
use App\Models\Agency;
use App\Models\Hotel;
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
        $hotel = $event->hotel;

        // Получаем всех клиентов (агентств)
        $agencies = Agency::all();

        foreach ($agencies as $agency) {
            // Получаем правила для текущего клиента
            $rules = $agency->rules;

            foreach ($rules as $rule) {
                // Проверяем отель на соответствие текущему правилу
                if ($this->checkRule($hotel, $rule)) {
                    // Если правило сработало, отправляем уведомление менеджеру
                    $this->sendNotification($agency, $rule);
                }
            }
        }
    }

    /**
     * Проверяет отель на соответствие правилу.
     *
     * @param  Hotel  $hotel
     * @param  Rule  $rule
     * @return bool
     */
    private function checkRule(Hotel $hotel, Rule $rule)
    {
        // Здесь нужно реализовать логику проверки отеля на соответствие правилу
        // В зависимости от типа правила и его условий
        // Для примера, просто проверим, что отель имеет определенный статус
        return $hotel->status === $rule->status;
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
