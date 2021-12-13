<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\Audit;
use App\Models\System;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuditControllerTest extends TestCase
{

    /** @test */
    public function show_all_audits()
    {
        $this->artisan('db:seed')->assertSuccessful();
        $audits = Audit::factory()->count(5)->create();

        $this->login();
        $response = $this->get('/audits');
        $response->assertSee($audits->random()->type);
        $response->assertSee($audits->random()->code);
    }
}
