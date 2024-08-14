<?php

namespace App\Services;

use App\Models\Hotel;
use App\Models\HotelAgreement;
use App\Models\Rule;
use App\Repositories\RuleRepository;

readonly class RuleService
{
    public function __construct(private RuleRepository $ruleRepository)
    {
    }

//    public function checkRule(Rule $rule, $data)
//    {
//        return $this->ruleChain->handle($rule, $data);
//    }

    public function getAllRules()
    {
        return $this->ruleRepository->getAllRules();
    }

    public function createRule($data)
    {
        return $this->ruleRepository->createRule($data);
    }

    public function getRuleById($id)
    {
        return $this->ruleRepository->getRuleById($id);
    }

    public function updateRule($id, $data)
    {
        return $this->ruleRepository->updateRule($id, $data);
    }

    public function deleteRule($id)
    {
        $this->ruleRepository->deleteRule($id);
    }

    public function checkRule(Rule $rule, Hotel $hotel)
    {
        $hotelAgreements = HotelAgreement::query()
            ->where(['hotel_id' => $hotel->id])
            ->with('company','hotel.options','hotel.city.country')
            ->get();

        foreach ($rule->conditions as $condition) {
            switch ($condition->comparisonTypes->type) {
                case 'integer':
                    break;
                case 'boolean':
                    break;
                case 'relation':
                    break;
            }
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
