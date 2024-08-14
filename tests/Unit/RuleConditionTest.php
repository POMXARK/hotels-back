<?php

namespace Tests\Unit;

use App\Models\Rule;
use App\Models\RuleCondition;
use PHPUnit\Framework\TestCase;

class RuleConditionTest extends TestCase
{
    public function test_rule_condition_belongs_to_rule()
    {
        $ruleCondition = new RuleCondition();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class, $ruleCondition->rule());
    }

    public function test_rule_condition_gets_rule()
    {
        $ruleCondition = new RuleCondition();
        $rule = $ruleCondition->rule;
        $this->assertInstanceOf(\App\Models\Rule::class, $rule);
    }
}
