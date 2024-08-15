<?php

namespace Feature\Controllers;

use App\Models\Agency;
use App\Models\Rule;
use App\Models\SqlQuery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RuleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $rules = Rule::factory(5)->create();
        $response = $this->get(route('rules.index'));
        $response->assertStatus(200);
        $response->assertSee($rules->first()->name);
    }

    public function test_create()
    {
        $agencies = Agency::factory(5)->create();
        $sqlQueries = SqlQuery::factory(5)->create();
        $response = $this->get(route('rules.create'));
        $response->assertStatus(200);
        $response->assertSee($agencies->first()->name);
        $response->assertSee($sqlQueries->first()->query);
    }

    public function test_store()
    {
        $agency = Agency::factory()->create();
        $sqlQuery = SqlQuery::factory()->create();
        $data = [
            'agency_id' => $agency->id,
            'name' => 'Test Rule',
            'text_for_manager' => 'Test text',
            'is_active' => true,
            'rule_conditions' => [$sqlQuery->id],
        ];
        $response = $this->post(route('rules.store'), $data);
        $response->assertRedirect(route('rules.index'));
        $this->assertDatabaseHas('rules', ['name' => 'Test Rule']);
    }

    public function test_edit()
    {
        $rule = Rule::factory()->create();
        $agencies = Agency::factory(5)->create();
        $sqlQueries = SqlQuery::factory(5)->create();
        $response = $this->get(route('rules.edit', $rule->id));
        $response->assertStatus(200);
        $response->assertSee($rule->name);
        $response->assertSee($agencies->first()->name);
        $response->assertSee($sqlQueries->first()->query);
    }

    public function test_update()
    {
        $rule = Rule::factory()->create();
        $agency = Agency::factory()->create();
        $sqlQuery = SqlQuery::factory()->create();
        $data = [
            'agency_id' => $agency->id,
            'name' => 'Updated Rule',
            'text_for_manager' => 'Updated text',
            'is_active' => true,
            'rule_conditions' => [$sqlQuery->id],
        ];
        $response = $this->put(route('rules.update', $rule->id), $data);
        $response->assertRedirect(route('rules.index'));
        $this->assertDatabaseHas('rules', ['name' => 'Updated Rule']);
    }

    public function test_destroy()
    {
        $rule = Rule::factory()->create();
        $response = $this->delete(route('rules.destroy', $rule->id));
        $response->assertRedirect(route('rules.index'));
        $this->assertDatabaseMissing('rules', ['id' => $rule->id]);
    }
}
