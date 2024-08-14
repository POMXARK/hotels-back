<?php

namespace Tests\Unit;

use App\Models\Rule;
use PHPUnit\Framework\TestCase;

class RuleTest extends TestCase
{
    public function test_rule_has_conditions()
    {
        $rule = new Rule();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\HasMany::class, $rule->conditions());
    }

    public function test_rule_gets_conditions()
    {
        $rule = new Rule();
        $conditions = $rule->conditions;
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $conditions);
    }
}
