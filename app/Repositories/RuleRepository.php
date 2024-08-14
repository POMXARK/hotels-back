<?php

namespace App\Repositories;

use App\Models\Rule;

class RuleRepository
{
    public function create(array $ruleData)
    {
        $rule = new Rule();
        $rule->agency_id = $ruleData['agency_id'];
        $rule->name = $ruleData['name'];
        $rule->text_for_manager = $ruleData['text_for_manager'];
        $rule->is_active = $ruleData['is_active'];
        $rule->save();

        return $rule;
    }

    public function update(int $ruleId, array $ruleData)
    {
        $rule = Rule::find($ruleId);
        $rule->agency_id = $ruleData['agency_id'];
        $rule->name = $ruleData['name'];
        $rule->text_for_manager = $ruleData['text_for_manager'];
        $rule->is_active = $ruleData['is_active'];
        $rule->save();

        return $rule;
    }

    public function delete(int $ruleId)
    {
        $rule = Rule::find($ruleId);
        $rule->ruleConditions()->delete();
        $rule->delete();

        return true;
    }
}
