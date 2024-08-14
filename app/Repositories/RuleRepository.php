<?php

namespace App\Repositories;

use App\Models\Rule;

class RuleRepository
{
    public function getAllRules()
    {
        return Rule::all();
    }

    public function createRule($data)
    {
        $rule = new Rule();
        $rule->name = $data['name'];
        $rule->agency_id = $data['agency_id'];
        $rule->text_for_manager = $data['text_for_manager'];
        $rule->save();

        foreach ($data['conditions'] as $condition) {
            $rule->conditions()->create($condition);
        }

        return $rule;
    }

    public function getRuleById($id)
    {
        return Rule::find($id);
    }

    public function updateRule($id, $data)
    {
        $rule = Rule::find($id);
        $rule->name = $data['name'];
        $rule->agency_id = $data['agency_id'];
        $rule->text_for_manager = $data['text_for_manager'];
        $rule->save();

        $rule->conditions()->delete();

        foreach ($data['conditions'] as $condition) {
            $rule->conditions()->create($condition);
        }

        return $rule;
    }

    public function deleteRule($id)
    {
        $rule = Rule::find($id);
        $rule->delete();
    }

    public function getConditionsByRule($rule)
    {
        return $rule->conditions;
    }
}
