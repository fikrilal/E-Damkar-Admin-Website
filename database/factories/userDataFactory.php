<?php

namespace Database\Factories;

use App\Models\user_listData;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class userDataFactory extends Factory
{
    
    protected $model = user_listData::class;



    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('superone'),
            'namaLengkap' => fake()->name(),
            'noHp' => fake()->randomNumber(5, true)
        ];
    }
}
