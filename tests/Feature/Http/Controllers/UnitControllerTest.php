<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\Unit;
use App\Models\User;
use App\Models\System;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnitControllerTest extends TestCase
{
    public function login()
    {
        $user = User::factory()->create();
        $this->user = $user;
        $this->actingAs($user);
    }

    /** @test */
    public function we_can_visit_index_page(): void
    {
        $units = Unit::factory()->count(5)->create();
        $this->login();
        $response = $this->get('/units');
        $response->assertSee($units->random()->structure);
    }

    /** @test */
    public function we_can_create_and_store_a_unit(): void
    {
        $this->login();
        // visit create page
        $response = $this->post('/units', [
            'structure' => 'Royal Tulip',
            'division' => 'East of Algeria',
            'facade' => 'hotel',
        ]);
        $unit = Unit::first();

        $this->assertSame('Royal Tulip', $unit->structure);
    }

    /** @test */
    public function we_can_update_a_unit(): void
    {
        $this->markTestIncomplete();
    }

    /** @test */
    public function we_can_see_a_single_unit(): void
    {
        $this->login();
        $units = Unit::factory()->count(5)->create();
        System::factory()->count(4)->create(['unit_id' => 3]);
        $response = $this->get('/units/3');
        $response->assertSee(Unit::find(3)->division);
        $response->assertSee(Unit::find(3)->facade);
        $response->assertSee(Unit::find(3)->structure);
        $this->assertCount(4, Unit::find(3)->systems);
    }

    /** @test */
    public function we_can_delete_a_unit(): void
    {
        $this->login();
        $units = Unit::factory()->count(5)->create();
        $this->assertCount(5, $units);
        $response = $this->delete('/units/4');
        $this->assertCount(4, Unit::get());
        $response = $this->delete('/units/3');
        $this->assertCount(3, Unit::get());
    }
}
