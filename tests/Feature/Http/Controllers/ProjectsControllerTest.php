<?php
namespace Tests\Feature\Http\Controllers;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsControllerTest extends TestCase
{

    /** @test */
    public function index_projects_page(): void
    {
        //given we have projects
        $projects = Projet::f
        //act we visit the projects page
        //assert we can see the project detail
    }
}
