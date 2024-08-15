<?php

namespace App\Services;

use App\Events\CheckHotelRules;
use App\Models\Agency;
use App\Models\Rule;
use App\Repositories\RuleRepository;
use Illuminate\Support\Facades\DB;

class RuleService
{
    public function __construct(private RuleRepository $ruleRepository)
    {
    }

    public function createRule(array $ruleData)
    {
        return $this->ruleRepository->create($ruleData);
    }

    public function updateRule(Rule $rule, array $ruleData)
    {
        return $this->ruleRepository->update($rule, $ruleData);
    }

    public function deleteRule(int $ruleId)
    {
        return $this->ruleRepository->delete($ruleId);
    }

    public function checkRule(int $hotelId)
    {
        $agencies = Agency::all();

        foreach ($agencies as $agency) {
            $rules = Rule::query()->where('agency_id', $agency->id)->get();
            foreach ($rules as $rule) {
                if ($this->handle($rule, $hotelId)) {
                    echo "<br/>" . 'Текст для менеджера: '. $rule->text_for_manager. ' (Агентство: '. $agency->name . "<br/>";
                    event(new CheckHotelRules($hotelId, $agency, $rule));
                }
            }
        }

        return true;
    }

    public function handle(Rule $rule, int $hotelId): bool
    {
        $check = true;
        $x = $this->ruleRepository->findById($rule->id, ['ruleConditions.sqlQuery']);

        if (count($x->ruleConditions) > 0) {
            foreach ($x->ruleConditions as $condition) {
                $query = $condition->sqlQuery->select . ' ' . $condition->sqlQuery->where . $hotelId;
                $result = DB::select('SELECT EXISTS (' . $query . ') AS `exists`');

                if ($result[0]->exists) {
                    echo 'Запрос вернул данные | ';
                } else {
                    echo 'Запрос не вернул данных | ';
                    $check = false;
                }

                echo $condition->sqlQuery->description . ' | ';
                echo $query . "<br/>";
            }
        } else {
            $check = false;
        }

        return $check;
    }
}
