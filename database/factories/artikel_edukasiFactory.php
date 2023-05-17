<?php

namespace Database\Factories;

use App\Models\artikel_edukasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\artikel_edukasi>
 */
class artikel_edukasiFactory extends Factory
{

    protected $model = artikel_edukasi::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "admin_damkar_id" => rand(1, 10),
            "judul_edukasi" => fake()->sentence(3),
            "deskripsi" => fake()->sentence(5),
            "tgl_edukasi" => date('Y-m-d'),
            "foto_artikel_edukasi" => "gambar",
        ];
    }
}
