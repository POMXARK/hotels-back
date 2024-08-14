<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\RuleController;
use App\Models\Agency;
use App\Models\Rule;
use App\Models\RuleCondition;
use App\Models\SqlQuery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RuleControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->ruleController = new RuleController();
    }

    public function test_store_method_creates_new_rule_and_rule_conditions()
    {
        $agency = Agency::factory()->create();
        $sqlQuery = SqlQuery::factory()->create();
        $request = new \Illuminate\Http\Request();
        $request->replace([
            'agency_id' => $agency->id,
            'name' => 'Test Rule',
            'text_for_manager' => 'Test text',
            'is_active' => true,
            'rule_conditions' => [$sqlQuery->id],
        ]);

        $response = $this->ruleController->store($request);

        $this->assertDatabaseHas('rules', [
            'agency_id' => $agency->id,
            'name' => 'Test Rule',
            'text_for_manager' => 'Test text',
            'is_active' => true,
        ]);

        $this->assertDatabaseHas('rule_conditions', [
            'rule_id' => 1,
            'sql_query_id' => $sqlQuery->id,
        ]);
    }

    public function test_update_method_updates_rule_and_rule_conditions()
    {
        $agency = Agency::factory()->create();
        $sqlQuery = SqlQuery::factory()->create();
        $rule = Rule::factory()->create(['agency_id' => $agency->id]);
        $ruleCondition = RuleCondition::factory()->create(['rule_id' => $rule->id, 'sql_query_id' => $sqlQuery->id]);

        $request = new \Illuminate\Http\Request();
        $request->replace([
            'agency_id' => $agency->id,
            'name' => 'Updated Rule',
            'text_for_manager' => 'Updated text',
            'is_active' => false,
            'rule_conditions' => [$sqlQuery->id],
        ]);

        $response = $this->ruleController->update($request, $rule->id);

        $this->assertDatabaseHas('rules', [
            'agency_id' => $agency->id,
            'name' => 'Updated Rule',
            'text_for_manager' => 'Updated text',
            'is_active' => 1,
        ]);

        $this->assertDatabaseHas('rule_conditions', [
            'rule_id' => $rule->id,
            'sql_query_id' => $sqlQuery->id,
        ]);
    }

    public function test_destroy_method_deletes_rule_and_rule_conditions()
    {
        $agency = Agency::factory()->create();
        $sqlQuery = SqlQuery::factory()->create();
        $rule = Rule::factory()->create(['agency_id' => $agency->id]);
        $ruleCondition = RuleCondition::factory()->create(['rule_id' => $rule->id, 'sql_query_id' => $sqlQuery->id]);

        $response = $this->ruleController->destroy($rule->id);

        $this->assertDatabaseMissing('rules', [
            'id' => $rule->id,
        ]);

        $this->assertDatabaseMissing('rule_conditions', [
            'rule_id' => $rule->id,
        ]);
    }
}
