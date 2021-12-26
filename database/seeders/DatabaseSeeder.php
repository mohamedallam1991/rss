<?php

namespace Database\Seeders;

use App\Models\Audit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // // \App\Models\User::factory(10)->create();
        // $structures = \App\Models\Structure::factory(10)->create();
        // foreach ($structures as $structure) {
        // $systems = \App\Models\System::factory()->count(5)->create(['structure_id' => $structure->id]);
        $systems = \App\Models\System::factory()->count(5)->create();
        foreach ($systems as $system) {
            $audits = \App\Models\Audit::factory()->count(5)->create(['system_id' => $system->id]);
        }
        // }
        // $audits = \App\Models\Audit::factory(10)->create();
    }
}
