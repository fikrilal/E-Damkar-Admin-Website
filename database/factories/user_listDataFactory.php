<?php

namespace Database\Factories;

use App\Models\user_listData;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\user_listData>
 */
class user_listDataFactory extends Factory
{

    protected $model = user_listData::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('superone'),
            'namaLengkap' => fake()->name(),
            'noHp' => fake()->randomNumber(5, true),
            'kodeOtp' => '', 
            'status' => '',
            'foto_user'=> ''
        ];
    }
}
