<?php

namespace Database\Factories;

use App\Models\admin_damkar;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin_damkar>
 */
class admin_damkarFactory extends Factory
{
    protected $model = admin_damkar::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nama_lengkap" => fake()->name(),
            "email" => fake()->unique()->email(),
            "password" => Hash::make("superone"),
            "noHp" => "085709868758"

        ];
    }
}
