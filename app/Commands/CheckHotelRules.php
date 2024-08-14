<?php

namespace App\Commands;

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Hotel;
use App\Models\Rule;
use App\Models\Agency;

class CheckHotelRules extends Command
{
    protected $signature = 'check:hotel-rules';
    protected $description = 'Проверить правила для отеля';

    public function handle()
    {
        $hotelId = 1; // выбранный отель
        $hotel = Hotel::find($hotelId);

        $agents = Agency::all();

        foreach ($agents as $agent) {
            $rules = Rule::where('agency_id', $agent->id)->get();

            foreach ($rules as $rule) {
                if ($this->checkRule($rule, $hotel)) {
                    echo "Текст для менеджера: ". $rule->text_for_manager. " (Агентство: ". $agent->name. ")\n";
                }
            }
        }
    }

    private function checkRule(Rule $rule, Hotel $hotel)
    {
        foreach ($rule->conditions as $condition) {
            $conditionClass = $this->getConditionClass($condition->condition_type);
            $conditionInstance = new $conditionClass($condition->operator, $condition->value);

            if (!$conditionInstance->check($hotel, $rule->agency)) {
                return false;
            }
        }

        return true;
    }

    private function getConditionClass($conditionType)
    {
        $conditionClasses = [
            'country' => \App\Conditions\CountryCondition::class,
            'city' => \App\Conditions\CityCondition::class,
            'tars' => \App\Conditions\StarsCondition::class,
            'discount_percent' => \App\Conditions\DiscountPercentCondition::class,
            'comission_percent' => \App\Conditions\ComissionPercentCondition::class,
            'is_default' => \App\Conditions\IsDefaultCondition::class,
            'company_id' => \App\Conditions\CompanyIdCondition::class,
            'is_black' => \App\Conditions\IsBlackCondition::class,
            'is_recomend' => \App\Conditions\IsRecomendCondition::class,
            'is_white' => \App\Conditions\IsWhiteCondition::class,
        ];

        return $conditionClasses[$conditionType];
    }
}
