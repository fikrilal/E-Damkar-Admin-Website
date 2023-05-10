<?php

namespace Database\Factories;

use App\Models\artikel_berita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\artikel_berita>
 */
class artikel_beritaFactory extends Factory
{

    protected $model = artikel_berita::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "admin_damkar_id" => rand(1, 10),
            "judul_berita" => fake()->sentence(3),
            "deskripsi_berita" => fake()->sentence(5),
            "tgl_berita" => date('Y-m-d'),
            "foto_artikel_berita" => "gambar",
        ];
    }
}
