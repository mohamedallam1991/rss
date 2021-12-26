<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
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

        $system = System::get()->random();
        // dd($system->audits->last()->updated_at->diffForHumans());
        // dd($system->audits->random()->created_at->difForHumans());
        // $system->audits->orderBy('updated_at')->take(1)->get()->first()->id

        $this->login();
        $response = $this->get('/audits');
        $response->assertSee($audits->random()->type);
        $response->assertSee($audits->random()->code);
    }

    /** @test */
    public function relationship()
    {
        $audit = Audit::factory()->create();
        $this->assertInstanceOf(User::class, $audit->user);
        $this->assertInstanceOf(System::class, $audit->system);
    }
}
