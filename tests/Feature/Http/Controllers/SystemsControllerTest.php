<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\Unit;
use App\Models\User;
use App\Models\Audit;
use App\Models\System;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SystemsControllerTest extends TestCase
{

    /** @test */
    public function index_projects_page(): void
    {
        $this->actingAs(User::factory()->create());
        $systems = System::factory()->count(5)->create();
        $response = $this->get('/systems');
        //assert we can see the project detail
        $response->assertSee($systems->random()->name);
        $response->assertSee($systems->random()->description);
        $response->assertSee($systems->random()->status);
        $response->assertSee($systems->random()->observation);
        $response->assertSee($systems->random()->children);
        $this->assertCount(5, System::all());
    }

    /** @test */
    public function relationship()
    {
        $system = System::factory()->create();
        Audit::factory()->create(['system_id' => $system->id]);
        // $this->assertInstanceOf(User::class, $audit->user);
        $this->assertInstanceOf(Audit::class, $system->audits->first());
    }


    /** @test */
    public function children_is_boolean(): void
    {
        $system = System::factory()->create();
        $this->assertIsBool($system->fresh()->children);
    }

    /** @test */
    public function storing_a_system()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->post('/systems', [
                'unit_id' => Unit::factory()->create()->id,
               'name' => 'system MacOs',
               'description' => 'Very well secure and no infections',
               'status' => 'working',
               'observation' => 'Life is good',
               'children' => false
           ]);
        $system = System::first();
        // dd($stored->first());
        $this->assertEquals($system->name, 'system MacOs');
        // $respone->assertSee(');
    }

    /** @test */
    public function projects_table_has_column_names(): void
    {
        $actualColumns = Schema::getColumnListing('systems');
        $this->assertContains('id', $actualColumns);
        $this->assertContains('name', $actualColumns); //nom
            $this->assertContains('description', $actualColumns); // etat_syst (32)
            $this->assertContains('status', $actualColumns); //obsv_syst
            $this->assertContains('observation', $actualColumns); //obsv_syst
            $this->assertContains('children', $actualColumns); //obsv_syst
            // $this->assertContains('non_system_mr', $actualColumns); //non_system_mr
    }
}
