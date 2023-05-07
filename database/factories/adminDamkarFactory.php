<?php

namespace Database\Factories;

use App\Models\admin_damkar;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class adminDamkarFactory extends Factory
{

    protected $model = App\Models\admin_damkar::class;
   
    
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
