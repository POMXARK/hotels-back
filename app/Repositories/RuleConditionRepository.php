<?php

namespace App\Repositories;

use App\Models\RuleCondition;

class RuleConditionRepository
{
    public function saveRuleConditions($rule, $ruleConditions)
    {
        $rule->ruleConditions()->delete();

        foreach ($ruleConditions as $condition) {
            $ruleCondition = new RuleCondition();
            $ruleCondition->rule_id = $rule->id;
            $ruleCondition->sql_query_id = $condition;
            $ruleCondition->save();
        }
    }
}
