<?php

namespace Database\Factories;

use App\Models\System;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuditFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'system_id' => System::factory()->create()->id,
            'type' => $this->faker->buildingNumber,
            'code' => $this->faker->currencyCode(),
            'level' => $this->faker->company(),
            'report' => $this->faker->sentence(),
            'recommandation' => $this->faker->paragraph(),
        ];
    }
    // $table->unsignedInteger('user_id');
    // $table->unsignedInteger('system_id');
    // $table->string('type');
    // $table->string('code');
    // $table->string('level');
    // $table->string('report');
    // $table->string('recommandation');
}
