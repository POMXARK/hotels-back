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

    public function findById(int $id, array $relations = null)
    {
        $query = Rule::query();
        return $relations ? $query->with($relations)->findOrFail($id) : $query->findOrFail($id);
    }

    public function update(Rule $rule, array $ruleData)
    {
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
