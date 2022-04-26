<?php

/**
 * @file UserTestFactory.php
 *
 * @date 09.11.2021
 *
 */

declare(strict_types=1);

namespace Database\Factories\TestFactory;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserTestFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'account_type' => '1',
            'full_name' => $this->faker->firstName . $this->faker->lastName,
            'phone' => random_int(79000000000, 79999999999),
            'email' => $this->faker->email,
            'is_banned' => 0,
            'lang' => 'ru',
        ];
    }
}
