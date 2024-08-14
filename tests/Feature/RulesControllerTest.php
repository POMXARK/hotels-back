<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RulesControllerTest extends TestCase
{
    public function test_index_page_returns_200_status_code()
    {
        $response = $this->get(route('rules.index'));
        $response->assertStatus(200);
    }

    public function test_create_page_returns_200_status_code()
    {
        $response = $this->get(route('rules.create'));
        $response->assertStatus(200);
    }

    public function test_store_rule_creates_new_rule()
    {
        $data = [
            'name' => 'Test Rule',
            'agency_id' => 1,
            'text_for_manager' => 'Test text',
        ];

        $response = $this->post(route('rules.store'), $data);
        $response->assertRedirect(route('rules.index'));

        $this->assertDatabaseHas('rules', [
            'name' => 'Test Rule',
            'agency_id' => 1,
            'text_for_manager' => 'Test text',
        ]);
    }

    public function test_edit_page_returns_200_status_code()
    {
        $rule = \App\Models\Rule::factory()->create();
        $response = $this->get(route('rules.edit', $rule->id));
        $response->assertStatus(200);
    }

    public function test_update_rule_updates_existing_rule()
    {
        $rule = \App\Models\Rule::factory()->create();
        $data = [
            'name' => 'Updated Test Rule',
            'agency_id' => 2,
            'text_for_manager' => 'Updated test text',
        ];

        $response = $this->put(route('rules.update', $rule->id), $data);
        $response->assertRedirect(route('rules.index'));

        $this->assertDatabaseHas('rules', [
            'name' => 'Updated Test Rule',
            'agency_id' => 2,
            'text_for_manager' => 'Updated test text',
        ]);
    }
}
