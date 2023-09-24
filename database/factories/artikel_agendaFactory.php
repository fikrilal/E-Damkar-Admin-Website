<?php

namespace Database\Factories;

use App\Models\artikel_agenda;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\artikel_agenda>
 */
class artikel_agendaFactory extends Factory
{

    protected $model = artikel_agenda::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "admin_damkar_id" => 1,
            "judul_agenda" => fake()->sentence(3),
            "tgl_agenda" => date('Y-m-d')
        ];
    }
}
