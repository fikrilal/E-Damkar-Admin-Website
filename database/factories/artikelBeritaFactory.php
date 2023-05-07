<?php

namespace Database\Factories;

use App\Models\artikel_berita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class artikelBeritaFactory extends Factory
{

    protected $model = artikel_berita::class;


    public function definition(): array
    {
        return [
            "admin_damkar_id" => rand(1, 10),
            "foto_berita_id" => "storage/gambar",
            "judul_berita" => fake()->sentence(3),
            "deskripsi_berita" => fake()->sentence(5),
            "tgl_berita" => now()
        ];
    }
}
