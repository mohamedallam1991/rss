<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $units = \App\Models\Unit::factory(10)->create();
        foreach ($units as $unit) {
            \App\Models\System::factory()->count(5)->create(['unit_id' => $unit->id]);
        }
    }
}
