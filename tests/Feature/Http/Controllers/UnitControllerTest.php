<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\Unit;
use App\Models\User;
use App\Models\System;
use App\Models\Structure;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnitControllerTest extends TestCase
{


    /** @test */
    public function we_can_visit_index_page(): void
    {
        $structures = Structure::factory()->count(5)->create();
        $this->login();
        $response = $this->get('/structures');
        $response->assertSee($structures->random()->unit);
    }

    /** @test */
    public function we_can_create_and_store_a_unit(): void
    {
        $this->login();
        // visit create page
        $response = $this->post('/structures', [
            'unit' => 'Royal Tulip',
            'division' => 'East of Algeria',
            'facade' => 'hotel',
        ]);
        $structure = Structure::first();

        $this->assertSame('Royal Tulip', $structure->unit);
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
        $structure = Structure::factory()->count(5)->create();
        System::factory()->count(4)->create(['structure_id' => 3]);
        $response = $this->get('/structures/3');
        $response->assertSee(Structure::find(3)->division);
        $response->assertSee(Structure::find(3)->facade);
        $response->assertSee(Structure::find(3)->unit);
        $this->assertCount(4, Structure::find(3)->systems);
    }

    /** @test */
    public function we_can_delete_a_unit(): void
    {
        $this->login();
        $structures = Structure::factory()->count(5)->create();
        $this->assertCount(5, $structures);
        $response = $this->delete('/structures/4');
        $this->assertCount(4, Structure::get());
        $response = $this->delete('/structures/3');
        $this->assertCount(3, Structure::get());
    }
}
